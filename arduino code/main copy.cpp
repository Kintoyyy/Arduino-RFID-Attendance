#include <Arduino.h>

#include <WiFi.h>
#include <HTTPClient.h>
#include <ArduinoJson.h>
#include <time.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <Keypad.h>
#include <ESP32Servo.h>
#include <SPI.h>
#include <MFRC522.h>

// RFID SERVER CONFIG --------
const char *SERVER_URL = "http://10.15.0.171/Group-6-Research-RFID/api/devices/send_card";
const char *API_KEY = "abc123";

// WIFI SETINGS --------------
const char *WIFI_SSID = "RATO_WIFI";
const char *WIFI_PASS = "@KentRato092303wifi";

// MODULES SETUP ----------------------
// -> LCD i2c <-
const int LCD_COLS = 20, LCD_ROWS = 4;
LiquidCrystal_I2C lcd(0x27, LCD_COLS, LCD_ROWS);

// -> RFID READER <-
const int RFID_RST_PIN = 17;
const int RFID_SS_PIN = 16;
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
const int timezone = 8 * 3600; // Replace "x" your timezone.
int time_dst = 0;
String hours, minutes, seconds;

unsigned long CLOCK_MILLIS = 0;
unsigned long RFID_MILLIS = 0;
unsigned long KEYPAD_MILLIS = 0;

// STRINGS---------------------------------------------------

// http -----

String CARD_DATA;

String DATA, Link;

// AMBOT ----
String card = "1234";
String KEYPAD_VALUE, KEYPAD_ACTIVE;

String OLD_CARD = "";

// Declaring Functions for C++ Compiler
void BLINK_TEXT(String text, int interval, int row);
void HOME_SCREEN();
void CLOCK();
boolean SCAN_CARD();


void setup()
{
    Serial.begin(115200);
    //-----------Start RFID Reader-------------
    SPI.begin();        // Init SPI bus
    mfrc522.PCD_Init(); // Init MFRC522 card
    //-----------Start LCD display-------------
    lcd.init();      // Init LCD display
    lcd.backlight(); // Turn on Backlight
    lcd.clear();     // Clear LCD  display

    // Display HomeScreen ------
    HOME_SCREEN();

    configTime(timezone, time_dst, "pool.ntp.org", "time.nist.gov");
}

void loop()
{
    HOME_SCREEN();
    // Wait until new tag is available
    while (SCAN_CARD())
    {
        Serial.print("[?] HTTP RESPONSE: ");
        delay(2000);
        HOME_SCREEN();
    }
}


void HOME_SCREEN()
{
    lcd.setCursor(0, 0);
    lcd.print("UCLM RFID ATTENDANCE");

    CLOCK();

    BLINK_TEXT("TAP CARD BELOW", 800, 3);
}

// Ticking clock with date
void CLOCK()
{
    if (millis() - CLOCK_MILLIS >= 1000)
    {
        CLOCK_MILLIS = millis();

        time_t now = time(nullptr);

        struct tm *p_tm = localtime(&now);

        if (p_tm->tm_hour == 0)
        {
            hours = "12";
        }
        else if (p_tm->tm_hour > 12)
        {
            hours = String(p_tm->tm_hour - 12);
        }
        else
        {
            hours = String(p_tm->tm_hour);
        }

        if ((p_tm->tm_min) < 10)
        {
            minutes = "0" + String(p_tm->tm_min);
        }
        else
        {
            minutes = String(p_tm->tm_min);
        }

        if ((p_tm->tm_sec) < 10)
        {
            seconds = "0" + String(p_tm->tm_sec);
        }
        else
        {
            seconds = String(p_tm->tm_sec);
        }

        String am_pm = (p_tm->tm_hour >= 12) ? "PM" : "AM";

        delay(50);
        lcd.setCursor(5, 1);

        String spacing = ((p_tm->tm_hour) <= 10) ? " " : "";

        lcd.print(hours + ":" + minutes + ":" + seconds + spacing + am_pm);

        String month = (p_tm->tm_mon + 1 < 10) ? "0" + String(p_tm->tm_mon + 1) : String(p_tm->tm_mon + 1);
        String day = (p_tm->tm_mday < 10) ? "0" + String(p_tm->tm_mday) : String(p_tm->tm_mday);
        String year = String(p_tm->tm_year + 1900);

        lcd.setCursor(5, 2);
        lcd.print(month + "/" + day + "/" + year);
    }
}



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
    mfrc522.PICC_HaltA(); // Stop reading
    return true;
}

// SCREEN STATES

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