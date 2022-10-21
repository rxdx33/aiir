import serial

if __name__ == '__main__':
    try:
        ser = serial.Serial('/dev/ttyACM0',9600, timeout=1)
    except:
        ser = serial.Serial('/dev/ttyACM1',9600, timeout=1)

    ser.flush()

    while True:
        if ser.in_waiting > 0:
            line = ser.readline().decode('utf-8').rstrip()
            file = open("/var/www/html/data.txt","w")
            file.write(line)
            file.close()

            print(line)