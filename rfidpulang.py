import serial
import mysql.connector
import requests
import winsound
from datetime import datetime
from datetime import datetime, timedelta


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
APPKEY = "f0cd147c-b3b8-4280-96a3-bd95f3c125a4"
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

def hari_ini():
    hari_map = {
        "Monday": "Senin",
        "Tuesday": "Selasa",
        "Wednesday": "Rabu",
        "Thursday": "Kamis",
        "Friday": "Jumat",
        "Saturday": "Sabtu",
        "Sunday": "Minggu"
    }
    return hari_map[datetime.now().strftime("%A")]

def hari_besok():
    hari_map = {
        "Monday": "Senin",
        "Tuesday": "Selasa",
        "Wednesday": "Rabu",
        "Thursday": "Kamis",
        "Friday": "Jumat",
        "Saturday": "Sabtu",
        "Sunday": "Minggu"
    }

    besok = datetime.now().date() + timedelta(days=1)
    return hari_map[besok.strftime("%A")]


def get_jadwal_pelajaran(hari, kelas):
    sql = """
        SELECT mapel
        FROM pelajaran
        WHERE hari = %s AND kelas = %s
        LIMIT 1
    """
    cursor.execute(sql, (hari, kelas))
    result = cursor.fetchone()
    return result["mapel"] if result else None

def get_jadwal_guru(hari, id_guru):
    sql = """
        SELECT kelas, mapel
        FROM jadwal_guru
        WHERE hari = %s AND id_guru = %s
    """
    cursor.execute(sql, (hari, id_guru))
    return cursor.fetchall()


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
            #now = datetime.now().time()
            #batas = datetime.strptime("10:00", "%H:%M").time()
            # Dapatkan jam sekarang (WIB)
            now = datetime.now().time()

            # Ambil jam batas dari DB (tabel settings)
            cursor.execute("SELECT value FROM settings WHERE `key` = 'batas_jam'")
            result = cursor.fetchone()

            if result:
                batas = datetime.strptime(result["value"], "%H:%M").time()
            else:
                batas = datetime.strptime("10:00", "%H:%M").time()  # fallback jika tidak ada


            # Tentukan suara berdasarkan jam
            if now > batas:
                print("Absensi setelah jam 10.00 — memainkan sampai jumpa.wav")
                bunyi_sampai_jumpa()
                status_absen = "pulang"
            else:
                bunyi_sukses()
                status_absen = "datang"

            # Kirim notifikasi WA
            #if siswa.get("no_hp"):
             #   if status_absen == "datang":
              #      pesan = (
               #         f"Halo, {siswa['nama_siswa']} sudah tiba di sekolah dengan selamat. "
                #        f"Semoga selalu sehat, bahagia, dan semangat mengikuti pelajaran hari ini."
                 #   )
                #else:  # pulang
                 #   pesan = (
                  #      f"Halo, {siswa['nama_siswa']} telah pulang dari sekolah. "
                   #     f"Semoga perjalanan pulang aman dan sampai rumah dengan selamat."
                    #)

                #kirim_wa(siswa["no_hp"], pesan)

#            if siswa.get("no_hp"):
#                hari = hari_ini()
#                kelas = siswa.get("kelas")
#                jadwal = get_jadwal_pelajaran(hari, siswa["kelas"])

#                if jadwal:
#                    jadwal_text = jadwal
#                else:
#                    jadwal_text = "Tidak ada jadwal pelajaran hari ini."

#                if status_absen == "datang":
#                    pesan = (
#                        f"Halo, *{siswa['nama_siswa']}* telah tiba di sekolah.\n\n"
#                        f"📅 *Jadwal Pelajaran Hari {hari} kelas {kelas}:*\n"
#                        f"{jadwal_text}\n\n"
#                        f"Semoga sehat dan semangat belajar hari ini."
#                    )
#                else:
#                    pesan = (
#                        f"Halo, *{siswa['nama_siswa']}* telah pulang dari sekolah.\n"
#                        f"Semoga perjalanan pulang aman dan sampai rumah dengan selamat."
#                    )

#                kirim_wa(siswa["no_hp"], pesan)

        if siswa.get("no_hp"):
            kelas = siswa.get("kelas")

            # Untuk Guru
            if kelas == "guru":
                hari = hari_ini()
                jadwal_guru = get_jadwal_guru(hari, siswa["id"])

                if jadwal_guru:
                    jadwal_text = ""
                    for j in jadwal_guru:
                        jadwal_text += f"• Kelas {j['kelas']} — {j['mapel']}\n"
                else:
                    jadwal_text = "Tidak ada jadwal mengajar hari ini."

                pesan = (
                    f"Halo, *{siswa['nama_siswa']}* 👩‍🏫\n\n"
                    f"📅 *Jadwal Mengajar Hari {hari}:*\n"
                    f"{jadwal_text}\n"
                    f"Semoga kegiatan mengajarnya lancar hari ini."
                )

            # ===============================
            # JIKA SISWA
            # ===============================
            else:
                # Untuk Siswa
                # Tentukan hari berdasarkan status absen
                if status_absen == "datang":
                    hari = hari_ini()
                    judul_jadwal = f"📅 *Jadwal Pelajaran Hari {hari} kelas {kelas}:*"
                    pesan_penutup = "Semoga sehat dan semangat belajar hari ini."
                else:  # pulang
                    hari = hari_besok()
                    judul_jadwal = f"📘 *Jadwal Pelajaran Besok ({hari}) kelas {kelas}:*"
                    pesan_penutup = "Jangan lupa belajar dan istirahat yang cukup😊."

                # Ambil jadwal dari database
                jadwal = get_jadwal_pelajaran(hari, kelas) if kelas else None

                if jadwal:
                    jadwal_text = jadwal
                else:
                    jadwal_text = "Tidak ada jadwal pelajaran."

                # Susun pesan WA
                pesan = (
                    f"Halo, *{siswa['nama_siswa']}* telah "
                    f"{'tiba di sekolah' if status_absen == 'datang' else 'pulang dari sekolah'}.\n\n"
                    f"{judul_jadwal}\n"
                    f"{jadwal_text}\n\n"
                    f"{pesan_penutup}"
                )

            kirim_wa(siswa["no_hp"], pesan)


        else:
            print("UID belum terdaftar di tabel siswas")
            winsound.Beep(1000, 300)  # Bunyi error
