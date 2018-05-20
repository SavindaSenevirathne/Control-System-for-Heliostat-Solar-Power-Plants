#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
#include <Servo.h> 

const char* ssid = "SavindaSenevirathne";
const char* password = "$uduBruno$uki6694";
String state = "OK";

float azimuth = 0;
float altitude = 0;
Servo altitudeServo,azimuthServo;  // create servo object to control a servo 

void servo(int azimuth, int altitude){
  
  azimuthServo.write(azimuth);
  altitudeServo.write(altitude);  
  
}

void setup () {

  Serial.begin(115200);
  WiFi.begin(ssid, password);
  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) { 
    delay(1000);
    Serial.print(".");
 
  }
  Serial.println("Connected");
  
  altitudeServo.attach(2);  // D4 - altitude servo
  azimuthServo.attach(4); //D2 - azimuth servo
}
 
void loop() {
 
   
    if (WiFi.status() == WL_CONNECTED) { //Check WiFi connection status
 
        HTTPClient http;  //Declare an object of class HTTPClient     
      
        http.begin("http://192.168.1.4/mirrors/?status="+state);  //Specify request destination
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

          servo(azimuth,altitude);                    
     
        }

      http.end();   //Close connection
 
  }

  delay(30000);    //Send a request every 30 seconds
 
}



