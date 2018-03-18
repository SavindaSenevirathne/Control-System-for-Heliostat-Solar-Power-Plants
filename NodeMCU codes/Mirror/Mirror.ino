#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
 
const char* ssid = "Senevirathne";
const char* password = "SuduBruno6694";
String state = "OK";

float azimuth = 0;
float altitude = 0;

void setup () {

  Serial.begin(115200);
  WiFi.begin(ssid, password);
  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) { 
    delay(1000);
    Serial.print(".");
 
  }
  Serial.println("Connected");
}
 
void loop() {
 
   
    if (WiFi.status() == WL_CONNECTED) { //Check WiFi connection status
 
        HTTPClient http;  //Declare an object of class HTTPClient     
      
      http.begin("http://192.168.1.2/mirrors/?status="+state);  //Specify request destination
      Serial.print("sending request.....");
      int httpCode = http.GET();                                                                  //Send the request
      Serial.println(httpCode);
      if (httpCode > 0) { //Check the returning code
        
        const size_t capacity = JSON_OBJECT_SIZE(2) + 60; //calculating the required size
        DynamicJsonBuffer jsonBuffer(capacity);
        JsonObject& root = jsonBuffer.parseObject(http.getString());
      
        // Extract values
        Serial.println(("Response:"));
        azimuth = root["azimuth"];
        altitude = root["altitude"];
        Serial.print("Azimuth = ");
        Serial.println(azimuth);
        Serial.print("Altitude = ");
        Serial.println(altitude);
   
      }


      http.end();   //Close connection
 
  }

  delay(30000);    //Send a request every 30 seconds
 
}



