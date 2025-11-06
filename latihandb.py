import mysql.connector

# Koneksi ke database hosting
conn = mysql.connector.connect(
    host="114.10.120.155",     # contoh: "sql123.infinityfree.com"
    user="smpmaar2_smpmaarif",         # contoh: "admin_user"
    password="smpmaarif65@rk",
    database="smpmaar2_smpmaarif"
)

# .\mysql.exe -h milan.id.domainesia.com -u smpmaar2_smpmaarif -p smpmaarif65@rk


cursor = conn.cursor()

# Contoh ambil semua data dari tabel "produk"
cursor.execute("SELECT * FROM admins")

# Ambil semua baris hasil query
rows = cursor.fetchall()

# Tampilkan hasil
for row in rows:
    print(row)

# Tutup koneksi
cursor.close()
conn.close()
