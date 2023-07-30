#!/usr/bin/python3

import json
import requests

# read file
with open('investments.json', 'r') as myfile:
    data = myfile.read()

# parse file
obj = json.loads(data)

HEADERS = {
    'Content-Type': 'application/json',
    'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpc3MiOiJteWFwcCIsInN1YiI6MSwiZXhwIjoxNjkwODM1MTQ3fQ.E7ntAeZY5H48wAvWo8606Zy2Z2iNMbGNJnqcb1eDGWjxpqczdRrdHRzfeOs005c6zDzCfpQp4pzGiZoTSL0VlL7l7P4ykyZGnk8aACVwUv3CL8iW-JKd3_wqvi5xyx5tUNeEed_z5utdvtdObo6W9HbdMpWnmldmbAYPRXT1WE8'
}

for x in obj:
    r = requests.post('http://localhost:8765/api/v1/transactions/', headers=HEADERS, json=x)
    print(x)
    print(r.status_code)
