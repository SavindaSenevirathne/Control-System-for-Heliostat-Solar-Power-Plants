#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266mDNS.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
#include <OneWire.h>
#include <DallasTemperature.h>

#define ONE_WIRE_BUS D3
 
OneWire oneWire(ONE_WIRE_BUS);
DallasTemperature sensors(&oneWire);

const char* ssid = "SoAp";
const char* password = "uzumaki.naruto";
String mirrorState = "";
double azimuth=0;
double altitude=0;
double temperature;

ESP8266WebServer server(80);

void handleRoot() {
  server.send(200, "text/plain", "hello from esp8266!");
}

void handleNotFound(){
  
  String message = "File Not Found\n\n";
  message += "URI: ";
  message += server.uri();
  message += "\nMethod: ";
  message += (server.method() == HTTP_GET)?"GET":"POST";
  message += "\nArguments: ";
  message += server.args();
  message += "\n";
  for (uint8_t i=0; i<server.args(); i++){
    message += " " + server.argName(i) + ": " + server.arg(i) + "\n";
  }
  server.send(404, "text/plain", message);
}

void measureTemperature(){
  sensors.requestTemperatures();
  temperature = sensors.getTempCByIndex(0);
}

void sendTemperature(){
    StaticJsonBuffer<300> JSONbuffer;   //Declaring static JSON buffer
    JsonObject& JSONencoder = JSONbuffer.createObject(); 
 
    JSONencoder["plant_id"] = 01;
    JSONencoder["temperature"] = temperature;
 
    char JSONmessageBuffer[300];
    JSONencoder.prettyPrintTo(JSONmessageBuffer, sizeof(JSONmessageBuffer));
    Serial.println(JSONmessageBuffer);
 
    HTTPClient http;    //Declare object of class HTTPClient
 
    http.begin("http://192.168.1.2:8000/api/temperatures");      //Specify request destination
    http.addHeader("Content-Type", "application/json");  //Specify content-type header
    
    int httpCode = http.POST(JSONmessageBuffer);   //Send the request

//    String payload = http.getString();                                        //Get the response payload
 
    Serial.println(httpCode);   //Print HTTP return code
//    Serial.println(payload);    //Print request response payload

    const size_t capacity = JSON_OBJECT_SIZE(2) + 60; //calculating the required size
    DynamicJsonBuffer jsonBuffer(capacity);
    JsonObject& pos = jsonBuffer.parseObject(http.getString());
  
    // Extract values
    Serial.println(("Response:"));
    azimuth = pos["azimuth"];
//    azimuth = (azimuth *180)/3.1415926535898;
    altitude = pos["altitude"];
//    altitude = (altitude *180)/3.1415926535898;
//    azimuth = 50;
//    altitude = 50;
    Serial.print("Azimuth = ");
    Serial.println((azimuth *180)/3.1415926535898,13);
    Serial.print("Altitude = ");
    Serial.println((altitude *180)/3.1415926535898,13);
 
    http.end();  //Close connection

}

void mirrors(){
    StaticJsonBuffer<300> JSONbuffer;   //Declaring static JSON buffer
    JsonObject& JSONencoderMirror = JSONbuffer.createObject(); 
 
    JSONencoderMirror["azimuth"] = azimuth;
    JSONencoderMirror["altitude"] = altitude; 

    
    mirrorState = server.arg("status"); //State feedback from the mirror
    
    char JSONmessageBuffer[300];
    JSONencoderMirror.prettyPrintTo(JSONmessageBuffer, sizeof(JSONmessageBuffer));
    Serial.println("Mirror request");
    Serial.println(JSONmessageBuffer);
    Serial.println("Status "+mirrorState);
    server.send(200, "application/json",JSONmessageBuffer );
}



void setup(void){
  Serial.begin(115200);
  WiFi.mode(WIFI_STA);
  
  WiFi.begin(ssid, password);
  Serial.println("");

  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

  if (MDNS.begin("esp8266")) {
    Serial.println("MDNS responder started");
  }

  server.on("/", handleRoot);

  server.on("/mirrors/", mirrors );

  server.onNotFound(handleNotFound);

  server.begin();
  Serial.println("HTTP server started");
  sensors.begin();
}
int i=0;
void loop(void){
  if(i%30==0){
    measureTemperature();   
    sendTemperature();    
  }else{
    server.handleClient();
  }
  
  i = i+1;
  delay(1000);
}
