import RPi.GPIO as GPIO
import dht11
import time
import datetime
import urllib.request as urllib2

# initialize GPIO
GPIO.setwarnings(True)
GPIO.setmode(GPIO.BCM)

# read data using pin 14
instance = dht11.DHT11(pin=17)

try:
    while True:
        result = instance.read()
        if result.is_valid():
            print("última entrada válida: " + str(datetime.datetime.now()))
            print("%-3.1f" % result.temperature)
            print("%-3.1f" % result.humidity)
            urllib2.urlopen("http://192.168.0.11/sensor/add_data.php?temperatura="+"%-3.1f" % result.temperature+"&humedad="+"%-3.1f" % result.humidity).read()
        time.sleep(300)

except KeyboardInterrupt:
    print("Limpiado")
    GPIO.cleanup()