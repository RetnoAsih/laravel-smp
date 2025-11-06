from flask import Flask, request, jsonify
import mysql.connector

app = Flask(__name__)

# Koneksi ke database MySQL lokal
db = mysql.connector.connect(
    host="localhost",
    user="root",          # ganti sesuai user MySQL kamu
    password="",          # isi password MySQL kalau ada
    database="db_pythonapi"
)

@app.route('/kirim', methods=['POST'])
def kirim_data():
    data = request.get_json()
    sensor = data.get('sensor')
    nilai = data.get('nilai')

    cursor = db.cursor()
    sql = "INSERT INTO data_suhu (sensor, nilai) VALUES (%s, %s)"
    val = (sensor, nilai)
    cursor.execute(sql, val)
    db.commit()

    return jsonify({"status": "sukses", "pesan": "Data berhasil dikirim!"})

@app.route('/data', methods=['GET'])
def ambil_data():
    cursor = db.cursor(dictionary=True)
    cursor.execute("SELECT * FROM data_suhu ORDER BY id DESC")
    hasil = cursor.fetchall()
    return jsonify(hasil)

if __name__ == '__main__':
    app.run(debug=True)
