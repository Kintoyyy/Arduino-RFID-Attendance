#include <WiFi.h>
#include <HTTPClient.h>
#include <ArduinoJson.h>
// #include <time.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <Keypad.h>
#include <ESP32Servo.h>
#include <SPI.h>
#include <MFRC522.h>

#include <RTClib.h>
#include <NTPClient.h>

// RFID SERVER CONFIG --------
const char *SERVER_URL = "http://10.15.0.171/Group-6-Research-RFID/api/devices";
const char *API_KEY = "28-4628-9e55-c11e";

// WIFI SETINGS --------------
const char *WIFI_SSID = "RATO_WIFI";
const char *WIFI_PASS = "@KentRato092303wifi";

// MODULES SETUP ----------------------
// -> LCD i2c <-
const int LCD_COLS = 20, LCD_ROWS = 4;
LiquidCrystal_I2C lcd(0x27, LCD_COLS, LCD_ROWS);

// -> RFID READER <-
const int RFID_RST_PIN = 15;
const int RFID_SS_PIN = 5;
MFRC522 mfrc522(RFID_SS_PIN, RFID_RST_PIN);

// -> KEYPAD <-
const byte keyRows = 4;
const byte keyCols = 4;

byte rowPins[keyRows] = {32, 33, 25, 26};
byte colPins[keyCols] = {27, 14, 12, 13};

char keys[keyRows][keyCols] = {
    {'1', '2', '3', 'A'},
    {'4', '5', '6', 'B'},
    {'7', '8', '9', 'C'},
    {'*', '0', '#', 'D'}};
Keypad keypad = Keypad(makeKeymap(keys), rowPins, colPins, keyRows, keyCols);

// -> SERVO <-
const int SERVO_PIN = 2;
int pos = 0;
Servo servo;

// -> BUZZER <-
const int BUZZER_PIN = 4;

// -> EMERGENCY BUTTON <-
const int buttonPin = 35;
int buttonState = HIGH; // assume button is not pressed

// -> TIME <-
RTC_DS3231 rtc;
WiFiUDP ntpUDP;
NTPClient timeClient(ntpUDP, "pool.ntp.org", 28800); // set time zone offset to UTC+8

// const int timezone = 8 * 3600; // Replace "x" your timezone.
// int time_dst = 0;
// // unsigned long CLOCK_MILLIS = 0;

unsigned long TIMOUT_MILLIS = 0;

// STRINGS---------------------------------------------------

// http -----

String CARD_DATA, KEYPAD_VALUE;
int CURRENT_DISPLAY, TIMEOUT_DISPLAY, HP_ID;
String HP_DEST, HP_LIMIT;
// Declaring Functions for C++ Compiler

void HOME_SCREEN();
void KEYPAD_SCREEN();
void HALLPASS_SCREEN();

boolean SCAN_CARD();
void PROCESS_KEYPAD(char key);
void SEND_CARD(String DATA, int TYPE);
void GET_DATA(char hallpass);

void CLOCK();
void BLINK_TEXT(String text, int interval, int row);

void CONNECT_WIFI();
void HTTP_ERRORS(int httpCode);
void SERVO_OPEN();

// ICONS ---------------------------------------------------
byte Check[] = {
    B00000,
    B00001,
    B00011,
    B10110,
    B11100,
    B01000,
    B00000,
    B00000};
byte amongUs[] = {
    B00000,
    B01100,
    B11110,
    B00011,
    B11111,
    B11111,
    B11110,
    B10010};
byte wifisignal[] = {
    B00001,
    B00001,
    B00101,
    B00101,
    B00101,
    B10101,
    B10101,
    B10101};
byte ipaddress[] = {
    B00000,
    B00000,
    B10111,
    B00101,
    B10111,
    B10100,
    B10100,
    B10100};
byte subArrow[] = {
    B10000,
    B10000,
    B10000,
    B10100,
    B10110,
    B11111,
    B00110,
    B00100};
byte smiley[] = {
    B00000,
    B01010,
    B01010,
    B01010,
    B00000,
    B10001,
    B01110,
    B00000};

void setup()
{
    Serial.begin(115200);
    Wire.begin();
    rtc.begin();
    //-----------Start RFID Reader-------------
    SPI.begin();        // Init SPI bus
    mfrc522.PCD_Init(); // Init MFRC522 card

    //-----------Start LCD display-------------
    lcd.init();      // Init LCD display
    lcd.backlight(); // Turn on Backlight
    lcd.clear();     // Clear LCD  display

    //-----------Initialize Servo -------------
    servo.attach(SERVO_PIN, 500, 2400);

    //-----------Connect To Wifi---------------
    CONNECT_WIFI();

    //-----------Initialize Icons -------------
    lcd.createChar(1, Check);
    lcd.createChar(2, amongUs);
    lcd.createChar(3, wifisignal);
    lcd.createChar(4, ipaddress);
    lcd.createChar(5, subArrow);
    lcd.createChar(6, smiley);

    //-----------Sync to NTP server ----------
    // configTime(timezone, time_dst, "pool.ntp.org", "time.nist.gov");
    timeClient.begin();
}

void loop()
{

    // Retry to connect to Wi-Fi
    if (!WiFi.isConnected())
    {
        CONNECT_WIFI();
    }
    // ---------- Set RTC time ---------------
    timeClient.update();
    DateTime now = timeClient.getEpochTime();
    rtc.adjust(DateTime(now.year(), now.month(), now.day(), now.hour(), now.minute(), now.second()));
    //-----------Scan for RFID Card-----------
    while (SCAN_CARD())
    {
        SEND_CARD(CARD_DATA, CURRENT_DISPLAY);

        static unsigned long previousMillis = 0;
        const unsigned long interval = 5000;

        unsigned long currentMillis = millis();

        if (currentMillis - previousMillis >= interval)
        {
            previousMillis = currentMillis;

            lcd.clear();
            CURRENT_DISPLAY = 0;
        }
    }

    char key = keypad.getKey(); // Read the keypad input

    if (key != NO_KEY)
    {
        CURRENT_DISPLAY = 1;      // Change Display if a key is pressed
        TIMOUT_MILLIS = millis(); // Store the current time as the time of the last keypress
        PROCESS_KEYPAD(key);      // Call the PROCESS_KEYPAD() function with the pressed key
    }

    if (millis() - TIMOUT_MILLIS > TIMEOUT_DISPLAY && TIMEOUT_DISPLAY != 0)
    {

        if (CURRENT_DISPLAY == 1 && KEYPAD_VALUE != "")
        {
            SEND_CARD(KEYPAD_VALUE, CURRENT_DISPLAY);
        }

        lcd.clear();              // Clear LCD after 10 Seconds
        CURRENT_DISPLAY = 0;      // Change Back to Idle screen after 10 Seconds
        KEYPAD_VALUE = "";        // Clear Keypad values after 10 Seconds
        TIMOUT_MILLIS = millis(); // Reset the last keypress time
    }

    switch (CURRENT_DISPLAY)
    {
    case 1:
        KEYPAD_SCREEN();
        TIMEOUT_DISPLAY = 5000;
        break;
    case 2:
        HALLPASS_SCREEN();
        TIMEOUT_DISPLAY = 10000;
        break;
    default:
        HOME_SCREEN();
        TIMEOUT_DISPLAY = 0;
        break;
    }
}

// Idle HomeScreen
void HOME_SCREEN()
{
    lcd.setCursor(0, 0);
    lcd.print("UCLM RFID ATTENDANCE");

    CLOCK();

    BLINK_TEXT("TAP CARD BELOW", 800, 3);
}

// Keypad input Screen
void KEYPAD_SCREEN()
{
    lcd.setCursor(2, 0);
    lcd.print("INPUT SCHOOL ID");
    lcd.setCursor(2, 2);
    lcd.print("CARD: " + KEYPAD_VALUE);
    BLINK_TEXT("OR TAP CARD", 800, 3);
}

void HALLPASS_SCREEN()
{
    lcd.setCursor(1, 0);
    lcd.print("HALLPASS ACTIVATED");
    lcd.setCursor(1, 1);
    lcd.print("Dest: " + HP_DEST);
    lcd.setCursor(1, 2);
    lcd.print("Limit: " + HP_LIMIT);
    BLINK_TEXT("TAP CARD TO PROCEED", 800, 3);
}

// Scan RFID Card
boolean SCAN_CARD()
{
    // Getting ready for Reading PICCs
    if (!mfrc522.PICC_IsNewCardPresent())
    { // If a new PICC placed to RFID reader continue
        return false;
    }
    if (!mfrc522.PICC_ReadCardSerial())
    { // Since a PICC placed get Serial and continue
        return false;
    }
    CARD_DATA = "";
    for (uint8_t i = 0; i < 4; i++)
    { // The MIFARE PICCs that we use have 4 byte UID
        // readCard[i] = mfrc522.uid.uidByte[i];
        //  CARD_DATA.concat(String(mfrc522.uid.uidByte[i], HEX));  // (HEX) Adds the 4 bytes in a single String variable
        CARD_DATA.concat(String(mfrc522.uid.uidByte[i])); // RAW DATA
    }
    CARD_DATA.toUpperCase();

    // Serial.println("[!] Card Scanned! : " + CARD_DATA);
    // mfrc522.PICC_HaltA(); // Stop reading

    return true;
}

// Send Card HTTP
void SEND_CARD(String DATA, int TYPE)
{
    KEYPAD_VALUE = "";
    String Link;

    lcd.clear();
    lcd.setCursor(4, 1);
    lcd.print("SENDING DATA");
    lcd.setCursor(4, 2);
    lcd.print("PLEASE WAIT:)");

    Serial.println("[?] Submit Data: " + (String)DATA);

    tone(BUZZER_PIN, 262, 300);

    if (WiFi.isConnected())
    {
        HTTPClient http;

        // GET Data
        // if (TYPE == 0)
        // {
        //     DATA = "/send_card?card=" + String(DATA);
        // }
        // else if (TYPE == 1)
        // {
        //     DATA = "/send_card?student_id=" + String(DATA);
        // }
        // else if (TYPE == 2)
        // {
        //     DATA = "/hallpass?card=" + String(DATA) + "&dest=" + HP_ID;
        // }

        switch (TYPE)
        {
        case 0:
            DATA = "/send_card?card=" + String(DATA);
            break;
        case 1:
            DATA = "/send_card?student_id=" + String(DATA);
            break;
        case 2:
            DATA = "/hallpass?card=" + String(DATA) + "&dest=" + HP_ID;
            break;
        default:
            return;
        }

        // GET method
        Link = SERVER_URL + DATA + "&api_key=" + String(API_KEY);
        http.begin(Link); // initiate HTTP request

        int httpCode = http.GET(); // Send the request

        Serial.println("[*] HTTP link: " + (String)Link); // Print HTTP return code
        Serial.println("[*] HTTP status code: " + (String)httpCode);

        if (httpCode == 200)
        {
            lcd.clear();
            String jsonStr = http.getString(); // Get the JSON response as a string
            DynamicJsonDocument jsonDoc(1024); // Create a JSON document 1KB
            deserializeJson(jsonDoc, jsonStr); // Parse the JSON string

            Serial.println("[?] HTTP RESPONSE: ");
            Serial.println(jsonStr);

            String api_event = jsonDoc["api_event"];

            // Door Access -------------------------------
            boolean door_access = jsonDoc["door_access"];
            if (door_access)
            {
                SERVO_OPEN();
            }

            if (api_event == "invalid_card")
            {
                lcd.setCursor(2, 0);
                lcd.print("ID Not Enrolled!");

                lcd.setCursor(1, 2);
                lcd.print("Tap change or");

                lcd.setCursor(1, 3);
                lcd.print("retype ID number");
            }
            else if (api_event == "time_in")
            {
                String api_message = jsonDoc["api_message"];
                String student_name = jsonDoc["student_name"];
                String student_section = jsonDoc["student_section"];
                String student_room = jsonDoc["student_room"];
                String student_status = jsonDoc["student_status"];

                lcd.setCursor(1, 0);
                lcd.print(api_message);

                lcd.setCursor(0, 1);
                lcd.print("name: " + student_name);

                lcd.setCursor(1, 2);
                lcd.write(5);

                lcd.setCursor(3, 2);
                lcd.print(student_section);

                lcd.setCursor(10, 2);
                lcd.write(5);

                lcd.setCursor(12, 2);
                lcd.print(student_room);

                lcd.setCursor((20 - student_status.length()) / 2, 3);
                lcd.print(student_status);
            }
            else if (api_event == "time_out")
            {
                String api_message = jsonDoc["api_message"];
                String student_name = jsonDoc["student_name"];
                String student_section = jsonDoc["student_section"];
                String student_room = jsonDoc["student_room"];
                String student_status = jsonDoc["student_status"];

                lcd.setCursor(1, 0);
                lcd.print(api_message);

                lcd.setCursor(0, 1);
                lcd.print("name: " + student_name);

                lcd.setCursor(1, 2);
                lcd.write(5);

                lcd.setCursor(3, 2);
                lcd.print(student_section);

                lcd.setCursor(10, 2);
                lcd.write(5);

                lcd.setCursor(12, 2);
                lcd.print(student_room);

                lcd.setCursor((20 - student_status.length()) / 2, 3);
                lcd.print(student_status);
            }
            else if (api_event == "invalid_key")
            {
                String api_message = jsonDoc["api_message"];
                String api_status = jsonDoc["api_status"];

                lcd.setCursor((20 - api_status.length()) / 2, 1);
                lcd.print(api_status);

                lcd.setCursor((20 - api_message.length()) / 2, 2);
                lcd.print(api_message);
            }
        }
        else
        {
            HTTP_ERRORS(httpCode);
        }

        http.end();
        delay(3000);
    }
}

// process keypad input
void PROCESS_KEYPAD(char key)
{
    lcd.clear();
    tone(BUZZER_PIN, 300, 100);

    if (KEYPAD_VALUE.length() >= 10)
    {
        KEYPAD_VALUE = "";
        Serial.println("[!] Data is Too Long");
    }

    switch (key)
    {
    case '*':
        KEYPAD_VALUE = "";
        Serial.println("[?] Key Input Cleared");
        break;

    case '#':

        if (KEYPAD_VALUE == "")
        {
            lcd.setCursor(8, 2);
            lcd.print("Enter ID#");
        }
        else
        {
            SEND_CARD(KEYPAD_VALUE, CURRENT_DISPLAY);
        }
        break;

    case 'A':
        Serial.println("Pressed: A");

        GET_DATA('A');
        break;

    case 'B':
        Serial.println("Pressed: B");

        GET_DATA('B');
        break;

    case 'C':
        Serial.println("Pressed: C");

        GET_DATA('C');
        break;

    case 'D':
        Serial.println("Pressed: D");

        GET_DATA('D');
        break;

    default:
        KEYPAD_VALUE += key;
        Serial.println("[?] Keypad Value: " + KEYPAD_VALUE);
        CURRENT_DISPLAY = 1;
        break;
    }
}

void GET_DATA(char hallpass)
{
    lcd.clear();
    KEYPAD_VALUE = "";

    // TEsting purpose
    HP_DEST = "HALLPASS " + (String)hallpass;
    HP_LIMIT = "10min";
    HP_ID = hallpass;
    CURRENT_DISPLAY = 2;

    String DATA, Link;
    if (WiFi.isConnected())
    {
        HTTPClient http;
        // GET Data
        DATA = "/hallpass?get_hallpass=" + (String)hallpass + "&api_key=" + String(API_KEY);
        // GET method
        Link = SERVER_URL + DATA;
        http.begin(Link); // initiate HTTP request

        int httpCode = http.GET(); // Send the request

        Serial.println("[*] HTTP link: " + (String)Link); // Print HTTP return code
        Serial.println("[*] HTTP status code: " + (String)httpCode);
        if (httpCode == 200)
        {
            String jsonStr = http.getString(); // Get the JSON response as a string
            DynamicJsonDocument jsonDoc(1024); // Create a JSON document 1KB
            deserializeJson(jsonDoc, jsonStr); // Parse the JSON string

            Serial.println("[?] HTTP RESPONSE: ");
            Serial.println(jsonStr);

            String api_event = jsonDoc["api_event"];
            String hallpass_dest = jsonDoc["hallpass_destination"];
            String hallpass_limit = jsonDoc["hallpass_limit"];

            HP_DEST = hallpass_dest;
            HP_LIMIT = hallpass_limit;
            HP_ID = hallpass;
            CURRENT_DISPLAY = 2;
        }
        else
        {
            HTTP_ERRORS(httpCode);
        }
        delay(100);
        http.end();
    }
}
// Ticking clock with date

void CLOCK()
{
    static unsigned long previousMillis = 0;
    const unsigned long interval = 1000;

    DateTime now = rtc.now();

    int hour = now.hour() % 12;
    if (hour == 0)
    {
        hour = 12;
    }

    String am_pm = (now.hour() >= 12) ? "PM" : "AM";

    unsigned long currentMillis = millis();

    if (currentMillis - previousMillis >= interval)
    {
        previousMillis = currentMillis;

        lcd.setCursor(5, 1);
        lcd.printf("%02d:%02d:%02d%s", hour, now.minute(), now.second(), am_pm.c_str());

        lcd.setCursor(5, 2);
        lcd.printf("%02d/%02d/%04d", now.month(), now.day(), now.year());
    }
}

// Blink Text Functionality
void BLINK_TEXT(String text, int interval, int row)
{
    static unsigned long lastTime = 0;
    static bool visible = true; // keep track of text visibility
    unsigned long currentTime = millis();
    if (currentTime - lastTime >= interval)
    {
        lastTime = currentTime;
        visible = !visible; // toggle visibility
        lcd.setCursor((20 - text.length()) / 2, row);
        if (visible)
        {
            lcd.print(text);
        }
        else
        {
            // print spaces instead of the text to make it invisible
            for (int i = 0; i < text.length(); i++)
            {
                lcd.print(" ");
            }
        }
    }
}

// Connect to wifi
void CONNECT_WIFI()
{
    WiFi.mode(WIFI_OFF);
    delay(500);

    WiFi.mode(WIFI_STA);

    WiFi.begin(WIFI_SSID, WIFI_PASS);

    while (WiFi.status() != WL_CONNECTED)
    {
        delay(500);
        lcd.clear();
        lcd.setCursor(0, 0);
        lcd.print("Connecting to...");
        lcd.setCursor(0, 1);
        lcd.print("SSID: " + (String)WIFI_SSID);
    }

    lcd.clear();
    // Check ICON
    lcd.setCursor(0, 0);
    lcd.write(1);
    // Wifi Name
    lcd.setCursor(1, 0);
    lcd.print(String("-> ") + WIFI_SSID);
    // iP ICON
    lcd.setCursor(0, 1);
    lcd.write(4);
    // Ip address text
    lcd.setCursor(2, 1);
    lcd.print(":");
    lcd.setCursor(3, 1);
    lcd.print(WiFi.localIP());
    // amongUs ICON
    lcd.setCursor(0, 2);
    lcd.write(2);
    // Mac Address Text
    lcd.setCursor(2, 2);
    lcd.print(":");
    lcd.setCursor(3, 2);
    lcd.print(WiFi.BSSIDstr());
    // Signal ICON
    lcd.setCursor(0, 3);
    lcd.write(3);
    // signal TEXT
    lcd.setCursor(2, 3);
    lcd.print(":");
    lcd.setCursor(3, 3);
    lcd.print(WiFi.RSSI());
    lcd.print("dB");

    // Calculate Signal Quality
    long rssi = WiFi.RSSI();
    long rssiCalc;
    delay(500);
    if (rssi <= -100)
        rssiCalc = 0;
    else if (rssi >= -50)
        rssiCalc = 100;
    else
        rssiCalc = 2 * (rssi + 100);
    lcd.setCursor(10, 3);
    lcd.print(rssiCalc);

    if (rssiCalc < 99)
    {
        lcd.setCursor(13, 3);
        lcd.print(" ");
        lcd.setCursor(12, 3);
    }
    else
        lcd.setCursor(13, 3);
    lcd.print("%");

    Serial.println("Connected");
    Serial.println("[*] Network information for : " + (String)WIFI_SSID);
    Serial.println("[+] BSSID : " + (String)WiFi.BSSIDstr());
    Serial.println("[+] Gateway IP : " + (String)WiFi.gatewayIP());
    Serial.println("[+] RSSI : " + (String)WiFi.RSSI() + " dB");
    Serial.println("[+] ESP32 IP : " + (String)WiFi.localIP());

    delay(5000);
    lcd.clear();
}

void HTTP_ERRORS(int httpCode)
{
    lcd.setCursor(1, 0);
    lcd.print("CONNECTION ERROR!");

    lcd.setCursor((10 - ((String)httpCode).length()) / 2, 2);
    lcd.print("HTTP CODE:" + (String)httpCode);

    lcd.setCursor(1, 3);
    if (httpCode == -1)
    {
        lcd.print("Server Unreachable");
    }
    delay(3000);
}

// Servo open
void SERVO_OPEN()
{
    Serial.print("[!] Servo Open: ");

    tone(BUZZER_PIN, 262, 250);
    for (pos = 0; pos <= 180; pos += 1)
    {
        servo.write(pos);
        // delay(15);
    }
    delay(5000);
    for (pos = 180; pos >= 0; pos -= 1)
    {
        servo.write(pos);
        delay(15);
    }
}