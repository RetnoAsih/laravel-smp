import serial
import requests

arduino_port = 'COM4'  # Ganti dengan port Arduino kamu
baud_rate = 9600

# Buka koneksi serial (sesuaikan port COM kamu)
#ser = serial.Serial('COM4', 9600)  

try:
    ser = serial.Serial(arduino_port, baud_rate)
    print(f"Tersambung ke {arduino_port}")
    while True:
        if ser.in_waiting > 0:
            uid = ser.readline().decode('utf-8').strip()
            print(f"Mengirim UID: {uid}")

            response = requests.post(
                'http://127.0.0.1:8000/api/tambah-absensi',
                data={'id_siswa': uid}
            )

            print("Respon Laravel:", response.text)


except Exception as e:
    print(f"Error: {e}")

