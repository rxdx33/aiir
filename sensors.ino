#include <Wire.h>
#include "Adafruit_SGP30.h"

Adafruit_SGP30 sgp;

uint32_t getAbsoluteHumidity(float temperature, float humidity) {
    // approximation formula from Sensirion SGP30 Driver Integration chapter 3.15
    const float absoluteHumidity = 216.7f * ((humidity / 100.0f) * 6.112f * exp((17.62f * temperature) / (243.12f + temperature)) / (273.15f + temperature)); // [g/m^3]
    const uint32_t absoluteHumidityScaled = static_cast<uint32_t>(1000.0f * absoluteHumidity); // [mg/m^3]
    return absoluteHumidityScaled;
}

#include "DHT.h"
#define DHTPIN 5     // Digital pin connected to the DHT sensor
#define DHTTYPE DHT22   // DHT 22  (AM2302), AM2321
DHT dht(DHTPIN, DHTTYPE);

int index = 0;
int counter = 0;
int temp = 0;

void setup() {
  // put your setup code here, to run once:
 Serial.begin(9600);
  while (!Serial) { delay(10); } // Wait for serial console to open!
  
  dht.begin();
  sgp.begin();
}


void loop() {
   // Wait a few seconds between measurements.
  delay(2000);

  // Reading temperature or humidity takes about 250 milliseconds!
  // Sensor readings may also be up to 2 seconds 'old' (its a very slow sensor)
  float hum = dht.readHumidity();
  // Read temperature as Celsius (the default)
  float tem = dht.readTemperature();
  temp = tem - 10;
  // Compute heat index in Celsius (isFahreheit = false)
  float feels = dht.computeHeatIndex(temp, hum, false);
  sgp.IAQmeasure();

  if (temp > 35) {
    index = 1;
  }
  else if (temp < 15){
    index = 2;
  }

  else if (hum > 80) {
    index = 3;
  }
  else if (hum < 20){
    index = 4;
  }

  else if (sgp.eCO2 > 700) {
    index = 5;
  }

  else if (sgp.TVOC > 800) {
    index = 6;
  }
  else if (temp && hum == 0) {
    index = 7;
  }
  else {
    index = 0;
  }
  Serial.print(hum);
  Serial.print(",");
  Serial.print(temp);
  Serial.print(",");
  Serial.print(feels);
  Serial.print(",");
  Serial.print(sgp.TVOC);
  Serial.print(",");
  Serial.print(sgp.eCO2);
  Serial.print(",");
  Serial.print(index);
  Serial.print("\n");
  delay(10);
  
  counter++;
  if (counter == 30) {
    counter = 0;

    uint16_t TVOC_base, eCO2_base;
    sgp.getIAQBaseline(&eCO2_base, &TVOC_base);
  
}
}
