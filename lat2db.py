import requests

url = "https://smpmaarifnuwanareja.sch.id/getdata.php"

response = requests.get(url)
data = response.json()

for d in data:
    print(d)
