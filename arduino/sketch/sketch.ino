// ------------------ RFID ATTENDANCE ---------------------------
// Gorup 6
// made by kent Rato

#include <LiquidCrystal_I2C.h>
#include <Keypad.h>
#include <ESP32Servo.h>

// SETUP LCD with i2c ------------------------------------------------
int lcdCols = 20, lcdRows = 4;

LiquidCrystal_I2C lcd(0x27, lcdCols, lcdRows);
// --------------------------------------------------------------------

// SETUP 4x4 Keypad ---------------------------------------------------
const byte keyRows = 4;
const byte keyCols = 4;

byte rowPins[keyRows] = {4, 13, 14, 27};
byte colPins[keyCols] = {26, 25, 33, 32};

char keys[keyRows][keyCols] = {
  {'1', '2', '3', 'A'},
  {'4', '5', '6', 'B'},
  {'7', '8', '9', 'C'},
  {'*', '0', '#', 'D'}
};
Keypad keypad = Keypad( makeKeymap(keys), rowPins, colPins, keyRows, keyCols );
// --------------------------------------------------------------------

// SERVO -------------------------------------------------------------
const int servoPin = 16;
int pos = 0;
Servo servo;
// --------------------------------------------------------------------

const String card = "1234";
String card_id;

// #define blueButton 35
// #define blackButton 34

void setup() {
  Serial.begin(115200);
  lcd.init();
  lcd.backlight();

  servo.attach(servoPin, 500, 2400);

  card_id.reserve(11);

  // pinMode(blueButton, INPUT_PULLUP);
}

// FUNCTIONS -------------------------------------------------------------
// TESTING PANI
void scrollText(int row, String message, int delayTime, int lcdColumns) {
  for (int i = 0; i < lcdColumns; i++) {
    message = " " + message;
  }
  message = message + " ";
  for (int pos = 0; pos < message.length(); pos++) {
    lcd.setCursor(0, row);
    lcd.print(message.substring(pos, pos + lcdColumns));
    delay(delayTime);
  }

}


void servoOpen() {
  tone(17, 262, 250);
  for (pos = 90; pos <= 180; pos += 1) {
    servo.write(pos);
    delay(15);
  }
  delay(5000);
  for (pos = 180; pos >= 90; pos -= 1) {
    servo.write(pos);
    delay(15);
  }
}

void processInput(char key) {

  switch (key) { // Side buttons
    case 'A':
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Hallpass Active");
      lcd.setCursor(0, 1);
      lcd.print("dest: Faculty");
      lcd.setCursor(0, 2);
      lcd.print("time limit: 10 min");
      lcd.setCursor(0, 3);
      lcd.print("TAP CARD TO PROCEED");
      delay(250);
      return;
    case 'B':
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Hallpass Active");
      lcd.setCursor(0, 1);
      lcd.print("dest: CR");
      lcd.setCursor(0, 2);
      lcd.print("time limit: 15 min");
      lcd.setCursor(0, 3);
      lcd.print("TAP CARD TO PROCEED");
      delay(5000);
      lcd.clear();
      return;
    case 'C':
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Hallpass Active");
      lcd.setCursor(0, 1);
      lcd.print("dest: LAB");
      lcd.setCursor(0, 2);
      lcd.print("subject: Physics");
      lcd.setCursor(0, 3);
      lcd.print("TAP CARD TO PROCEED");
      delay(5000);
      lcd.clear();
      return;
    case 'D':
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Hallpass Active");
      lcd.setCursor(0, 1);
      lcd.print("dest: Canteen");
      lcd.setCursor(0, 2);
      lcd.print("time limit: 20 min");
      lcd.setCursor(0, 3);
      lcd.print("TAP CARD TO PROCEED");
      delay(5000);
      lcd.clear();
      return;
  }

  if (key == '*') {
    card_id = "";
    lcd.clear();
  } else if (key == '#') {
    if (card == card_id) {
      Serial.println("Attendance Success!");
      Serial.println("Door OPEN");
      lcd.setCursor(0, 0);
      lcd.print("Attendance Success!");
      lcd.setCursor(0, 1);
      lcd.print("Student: " + card_id);
      lcd.setCursor(0, 2);
      lcd.print("Section: ST12P1");
      servoOpen();

    } else {

      Serial.println("student id not found!");
      lcd.setCursor(0, 0);
      lcd.print("Student Not found!");
      lcd.setCursor(0, 1);
      lcd.print("Check ID number");
      lcd.setCursor(0, 2);
      lcd.print("Student: " + card_id);
    }
    delay(5000);
    lcd.clear();
    card_id = "";
    return;
  } else {
    card_id += key; // append new character to input card string
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("Manual input card");
    lcd.setCursor(0, 2);
    lcd.print("card: " + card_id);
    return;
  }
}


int lastState = HIGH;
void loop() {

  // int value = digitalRead((blueButton));
  // if (lastState != value) {
  //   lastState = value;
  //   if (value == HIGH) {
  //     Serial.println("RFID Attendance Success!");
  //     Serial.println("Door OPEN");
  //     lcd.setCursor(0, 0);
  //     lcd.print("Welcome Kent!");
  //     lcd.setCursor(0, 1);
  //     lcd.print("Student id: 123456");
  //     lcd.setCursor(0, 2);
  //     lcd.print("Section: ST12P1");
  //     servoOpen();
  //   }
  // }

  char key = keypad.getKey();
  if (key) {
    tone(17, 262, 250);
    processInput(key);
  }
}