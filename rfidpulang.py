import serial
import mysql.connector
import requests
import winsound
from datetime import datetime

# ========================
# Konfigurasi
# ========================

# Arduino
arduino_port = 'COM4'
baud_rate = 9600

# Database MySQL (XAMPP atau hosting)
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",      # default XAMPP tanpa password
    database="smpmaarif"
)
cursor = db.cursor(dictionary=True)

# API Saungwa
SAUNGWA_URL = "https://app.saungwa.com/api/create-message"
APPKEY = "4327df1a-f2d5-42c4-adb4-9b00da67bb27"
AUTHKEY = "vu9aMiZvSaC5kblVBQtq3eE9q2XuxJaO1nUsROVrHHJYg5U5ru"

# ========================
# Fungsi
# ========================

def kirim_wa(nomor, pesan):
    payload = {
        'appkey': APPKEY,
        'authkey': AUTHKEY,
        'to': nomor,
        'message': pesan,
    }
    try:
        response = requests.post(SAUNGWA_URL, data=payload)
        if response.status_code == 200:
            print(f"WA terkirim ke {nomor}")
        else:
            print(f"Gagal kirim WA ({response.status_code}): {response.text}")
    except Exception as e:
        print(f"Error kirim WA: {e}")

def bunyi_sukses():
    # Suara untuk absen sebelum jam 10.00
    winsound.Beep(1000, 300)
    winsound.PlaySound("berhasil1.wav", winsound.SND_FILENAME)

def bunyi_sampai_jumpa():
    # Suara untuk absen setelah jam 10.00
    winsound.Beep(700, 300)
    winsound.PlaySound("sampaijumpa.wav", winsound.SND_FILENAME)

# ========================
# Main Loop
# ========================

ser = serial.Serial(arduino_port, baud_rate)
print("Tersambung ke Arduino di", arduino_port)

while True:
    if ser.in_waiting > 0:
        uid = ser.readline().decode('utf-8').strip()
        print("UID:", uid)

        # Cari siswa berdasarkan UID
        cursor.execute("SELECT * FROM siswas WHERE uid = %s", (uid,))
        siswa = cursor.fetchone()

        if siswa:
            # Simpan absensi
            sql = "INSERT INTO absensis (id_siswa) VALUES (%s)"
            val = (uid,)
            cursor.execute(sql, val)
            db.commit()
            print(f"Absensi tersimpan untuk {siswa['nama_siswa']}")

            # Dapatkan jam sekarang (WIB)
            now = datetime.now().time()
            batas = datetime.strptime("10:00", "%H:%M").time()

            # Tentukan suara berdasarkan jam
            if now > batas:
                print("Absensi setelah jam 10.00 — memainkan sampai jumpa.wav")
                bunyi_sampai_jumpa()
            else:
                bunyi_sukses()

            # Kirim notifikasi WA
            if siswa.get("no_hp"):
                pesan = f"Halo, {siswa['nama_siswa']} sudah tiba di sekolah dengan selamat. Semoga selalu sehat, bahagia, dan semangat mengikuti pelajaran hari ini."
                kirim_wa(siswa["no_hp"], pesan)
        else:
            print("UID belum terdaftar di tabel siswas")
            winsound.Beep(1000, 300)  # Bunyi error
