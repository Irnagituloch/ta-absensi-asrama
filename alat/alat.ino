#include <SPI.h>
#include <MFRC522.h>
#define SS_PIN 15 //D8
#define RST_PIN 2 //D4
MFRC522 mfrc522(SS_PIN, RST_PIN);

#include <Wire.h>
#include <LiquidCrystal_I2C.h>


#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266HTTPClient.h>

const char* ssid = "Nokia";
const char* password = "pppppppp";
const char *serverName = "http://192.168.130.194/absensi-asrama/master/master-data/data-mahasiswi/post-data";

String output5State = "off";
LiquidCrystal_I2C lcd(0x27, 16, 2);

String card_num;

void setup() {
  Serial.begin(115200);
  SPI.begin();
  mfrc522.PCD_Init();
  Serial.println();

  lcd.setCursor(1, 0);
  lcd.init();
  lcd.backlight();
  lcd.print("System Loading");
  for (int a = 0; a <= 15; a++) {
    lcd.setCursor(a, 1);
    lcd.print(".");
    delay(500);
  }
  lcd.clear();


WiFi.begin(ssid, password);  // Connect to Wi-Fi network

  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());

}

void loop() {
  if ( ! mfrc522.PICC_IsNewCardPresent() || ! mfrc522.PICC_ReadCardSerial()){
    return;
  }
  card_num = getCardNumber();
  showData();

}

String getCardNumber(){
  String UID = "";
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    UID += String(mfrc522.uid.uidByte[i] < 0x10 ? "0" : "");
    UID += String(mfrc522.uid.uidByte[i], HEX);
  }
  UID.toUpperCase();
  return UID;
}
void showData(){
  
    Serial.print("UID : ");
    Serial.print(card_num);
    Serial.println();

   lcd.setCursor(0,0);  
   lcd.print("ID");  
   lcd.setCursor(0,1);  
   lcd.print(card_num); 

  delay(2000);
  
}