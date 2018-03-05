#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
 
const char* ssid = "Senevirathne";
const char* password = "SuduBruno6694";
int p = 0;
int q = 0;

void setup () {

  
  
  Serial.begin(115200);
  WiFi.begin(ssid, password);
 Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
 
    delay(1000);
    Serial.print(".");
 
  }
  Serial.println("Connected")
}
 
void loop() {
 
   
    if (WiFi.status() == WL_CONNECTED) { //Check WiFi connection status
 
       HTTPClient http;  //Declare an object of class HTTPClient
      
     
  
//      Serial.println(String(wellLevel)+" "+String(tankLevel));
     
      
      
      http.begin("http://192.168.1.6:8000/getRequest/?q="+String(q)+"&p="+String(p));  //Specify request destination
//        http.begin("http://192.168.1.6:8000/getRequest/?q=6&p=10");  //Specify request destination
      Serial.print("sending request.....");
      int httpCode = http.GET();                                                                  //Send the request
      Serial.println(httpCode);
      if (httpCode > 0) { //Check the returning code
   
        String payload = http.getString();   //Get the request response payload
        Serial.println(payload);                     //Print the response payload
   
      }
   
      http.end();   //Close connection
 
  }
  p++;
  q = q+2;
  delay(1);    //Send a request every 3 seconds
 
}



