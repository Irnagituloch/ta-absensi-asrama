#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>

const int buzzerPin = D3;  // Change D3 to the actual pin you've connected the buzzer to

#define SS_PIN 15 //D8
#define RST_PIN 2 //D4
MFRC522 mfrc522(SS_PIN, RST_PIN);
String card_num;

const char* ssid = "Ketapang";
const char* password = "irna1111";
const char *serverName = "http://192.168.114.148/absensi-asrama/api/sensor/save";
WiFiServer server(80);

LiquidCrystal_I2C lcd(0x27, 16, 2);

void setup() {
  Serial.begin(115200);
  pinMode(buzzerPin, OUTPUT);

  // Connect to Wi-Fi network with SSID and password
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);
  SPI.begin();
  mfrc522.PCD_Init();

  // LCD CONTROLLER ===============
  // SPLASH SCREEN
  lcd.init();
  lcd.backlight();
  lcd.setCursor(1, 0);
  lcd.print("System Loading");
  for (int a = 0; a <= 15; a++) {
    lcd.setCursor(a, 1);
    lcd.print(".");
    delay(100);
  }
  lcd.clear();

  // PROSES CEK SSID
  lcd.setCursor(0, 1);
  lcd.print("Connect To : ");
  lcd.setCursor(1, 1);
  lcd.print(ssid);
  lcd.clear();

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(" . ");
  }

  // Print local IP address
  Serial.println("");
  Serial.println("WiFi connected.");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());

  // MENCARI IP
  lcd.print("Mencari IP :");
  for (int a = 0; a <= 15; a++) {
    lcd.setCursor(a, 1);
    lcd.print(".");
    delay(100);
  }
  lcd.clear();

  // MENAMPILKAN IP WIFI
  lcd.print(WiFi.localIP());
  for (int a = 0; a <= 15; a++) {
    lcd.setCursor(a, 1);
    lcd.print(".");
    delay(100);
  }
  lcd.clear();

  lcd.setCursor(0, 1);
  lcd.print("Terhubung Ke : ");
  lcd.setCursor(1, 1);
  lcd.print(ssid);
  delay(2000);
  lcd.clear();

  lcd.setCursor(0, 0);
  lcd.print("Silahkan");
  lcd.setCursor(0, 1);
  lcd.print("Scan Kartu");
}

void loop() {
  if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
    // Read the card UID
    card_num = getRFIDCardNumber();
    tone(buzzerPin, 1000, 500);

    // Display the UID on Serial Monitor
    Serial.print("UID : ");
    Serial.println(card_num);

    // Display the UID on the LCD
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("ID");
    lcd.setCursor(0, 1);
    lcd.print(card_num);

    delay(2000);  // Adjust the delay as needed
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("Silahkan");
    lcd.setCursor(0, 1);
    lcd.print("Scan Kartu");

    // PROSES STORE DATA=======================
    if (WiFi.status() == WL_CONNECTED) {
      HTTPClient http;
      http.begin(serverName);
      http.addHeader("Content-Type", "application/x-www-form-urlencoded");

      String httpRequestData = "uid=" + card_num;

      Serial.print("httpRequestData: ");
      Serial.println(httpRequestData);

      int httpResponseCode = http.POST(httpRequestData);

      if (httpResponseCode > 0) {
        Serial.print("HTTP Response code: ");
        Serial.println(httpResponseCode);
      } else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
      }
      http.end();
      
      delay(2000);
    }

    card_num = "";  // Clear the card number after sending
  }
}

String getRFIDCardNumber() {
  String UID = "";
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    UID += String(mfrc522.uid.uidByte[i] < 0x10 ? "0" : "");
    UID += String(mfrc522.uid.uidByte[i], HEX);
  }
  UID.toUpperCase();
  return UID;
}
