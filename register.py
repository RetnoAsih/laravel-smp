import serial
import mysql.connector

# Koneksi ke MySQL
db = latihandb.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="smpmaarif"
)
cursor = db.cursor()

# Koneksi ke Arduino (ganti COM sesuai port kamu)
ser = serial.Serial('COM4', 9600)

print("=== Sistem Registrasi RFID Siswa ===")
print("Tap kartu RFID...")

while True:
    if ser.in_waiting > 0:
        uid = ser.readline().decode('utf-8').strip().upper()
        print(f"\nUID terbaca: {uid}")

        # Cari apakah UID sudah terdaftar
        cursor.execute("SELECT nama_siswa FROM siswas WHERE uid=%s", (uid,))
        result = cursor.fetchone()

        if result:
            print(f"Kartu ini sudah terdaftar untuk: {result[0]}")
            continue  # langsung kembali tunggu kartu berikutnya

        # Tampilkan siswa yang belum punya UID
        cursor.execute("SELECT id, nama_siswa FROM siswas WHERE uid IS NULL")
        siswa_list = cursor.fetchall()

        if not siswa_list:
            print("Semua siswa sudah punya kartu RFID.")
            continue

        print("\nDaftar siswa tanpa kartu:")
        for s in siswa_list:
            print(f"{s[0]}. {s[1]}")

        pilihan = input("\nMasukkan ID siswa yang sesuai dengan kartu ini: ")
        cursor.execute("UPDATE siswas SET uid=%s WHERE id=%s", (uid, pilihan))
        db.commit()
        print("Kartu berhasil diregistrasi!\n")
        continue  # kembali tunggu kartu berikutnya
