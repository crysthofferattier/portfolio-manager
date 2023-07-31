#!/usr/bin/python3

import json
import requests
import sys

# read file

FILE = sys.argv[1]

with open(FILE, 'r') as myfile:
    data = myfile.read()

# parse file
obj = json.loads(data)

HEADERS = {
    'Content-Type': 'application/json',
    'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpc3MiOiJteWFwcCIsInN1YiI6MSwiZXhwIjoxNjkwOTI0MzIyfQ.Q5jG2BaQDguX0JIEn8iire138owKhGNZn-dsbo59r5Oo-rO2zWLUlIP4omrzsadJp7z132IPltV5sBecW6cndA-DernIjWWJ3dS8yRWNB6LtosZWePddktPRkmFLvYS_d2uPOc0xuD4cRMIVcIXg7_qsJW_7lr52avtqLG4nJWg'
}

for x in obj:
    r = requests.post('http://localhost:8765/api/v1/dividends.json', headers=HEADERS, json=x)
    print(x)
    print(r.status_code)
