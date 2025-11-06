import serial
import mysql.connector

# Koneksi ke Arduino (cek port di Device Manager, misal COM3)
arduino_port = 'COM4'
baud_rate = 9600

# Koneksi ke MySQL (XAMPP)
db = latihandb.connector.connect(
    host="localhost",
    user="root",
    password="",      # default XAMPP tanpa password
    database="smpmaarif"
)

cursor = db.cursor()

# Pastikan tabel sudah dibuat:
# CREATE TABLE rfid_log (id INT AUTO_INCREMENT PRIMARY KEY, uid VARCHAR(50), waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP);

ser = serial.Serial(arduino_port, baud_rate)
print("Tersambung ke Arduino di", arduino_port)

while True:
    if ser.in_waiting > 0:
        uid = ser.readline().decode('utf-8').strip()
        print("UID:", uid)

        # Simpan ke database
        sql = "INSERT INTO absensis (id_siswa) VALUES (%s)"
        val = (uid,)
        cursor.execute(sql, val)
        db.commit()
        print("Data tersimpan ke database")

        import winsound
        winsound.Beep(1000, 300)  # frekuensi 1000 Hz, durasi 300 ms

        winsound.PlaySound("berhasil1.wav", winsound.SND_FILENAME)
        
