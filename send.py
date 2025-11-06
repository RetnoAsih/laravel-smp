import requests

url = "http://127.0.0.1:5000/kirim"
data = {
    "sensor": "DHT11",
    "nilai": 27.5
}

response = requests.post(url, json=data)
print(response.json())
