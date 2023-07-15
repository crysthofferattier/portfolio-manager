#!/usr/bin/python3

import json
import requests

# read file
with open('investments.json', 'r') as myfile:
    data = myfile.read()

# parse file
obj = json.loads(data)

HEADERS = {
    'Content-Type': 'application/json'
}

for x in obj:
    r = requests.post('http://localhost:8765/api/v1/transactions/', headers=HEADERS, json=x)
    print(x)
    print(r.status_code)
