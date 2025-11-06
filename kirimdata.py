import requests
from datetime import datetime

url = "http://127.0.0.1:8000/rfid"

data = {
    "uid": "A1B2C3D4",
    "waktu": datetime.now().strftime("%Y-%m-%d %H:%M:%S")
}

try:
    response = requests.post(url, json=data)
    print(response.status_code)
    print(response.text)
except Exception as e:
    print("Gagal mengirim data:", e)
