import serial
import requests

# Konfigurasi serial Arduino
arduino_port = 'COM3'  # Ganti dengan port Arduino kamu
baud_rate = 9600

# URL Laravel (localhost)
laravel_url = 'http://127.0.0.1:8000/absensi/tambahabsensi'  # Ganti sesuai route di Laravel

# Token CSRF Laravel (ambil dari source HTML form Laravel)
csrf_token = 'u8sGDQL0CCysDGA56pmzo9HrEVTurNoSEpnQCtBU'

try:
    ser = serial.Serial(arduino_port, baud_rate)
    print(f"Tersambung ke {arduino_port}")

    while True:
        if ser.in_waiting > 0:
            uid = ser.readline().decode('utf-8').strip()
            print(f"UID terbaca: {uid}")

            # Data yang akan dikirim ke Laravel
            payload = {
                '_token': csrf_token,
                'id_siswa': uid
            }

            # Kirim ke Laravel
            response = requests.post(laravel_url, data=payload)

            if response.status_code == 200:
                print("✅ Data berhasil dikirim ke Laravel")
            else:
                print(f"❌ Gagal kirim. Status code: {response.status_code}")

except Exception as e:
    print(f"Error: {e}")