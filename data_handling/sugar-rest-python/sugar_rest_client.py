#!/usr/bin/python
import urllib,urllib2,json, sys
import hashlib

import httplib

debug = True

if debug:
    httplib.HTTPConnection.debuglevel = 1


url = 'http://192.168.65.128/sugarcrm/custom/service/v3/rest.php'


# Parsed by datetime.strftime()
xmlFileName = 'Export-%Y-%m=%d.xml'

def sendRequest(method, data, response_type="JSON"):
    args = {'method': method, 'input_type': 'JSON', 'response_type' : response_type, 'rest_data' : data}
    params = urllib.urlencode(args)
    response = urllib.urlopen(url, params)
    response = response.read()
    try:
        if response_type == 'JSON':
            result = json.loads(response)
        else:
            result = response
    except TypeError:
        raise
    except ValueError:
        raise

    # check version of python, if lower than 2.7.2 strip unicode
    #if sys.version_info <= (2, 7, 2):
    result = stripUnicode(result)

    return result

sess_id = ''
connected = 0

def print_sess():
    print sess_id

def login(username="admin", password="ncs", hashed=False):
    pass_encoded = password if hashed else hashlib.md5(password).hexdigest()
    args = {'user_auth' : {'user_name' : username, 'password' : pass_encoded}}

    x = sendRequest('login', args)
    try:
        global sess_id 
        sess_id = x["id"]
        if debug:
            print "Sess_id = ", sess_id
    except KeyError:
        raise

    # If all goes well we've successfully connected
    connected = 1
    return x
    

def get_server_info():
    return sendRequest("get_server_info", sess_id)

import datetime

def get_xml_data():
    fileName = datetime.datetime.now().strftime(xmlFileName)
    outF = open(fileName, "w")
    # No intermediary variable due to the size of the export
    outF.writelines(sendRequest("export_vdr_data", [sess_id], response_type="XML"))
    outF.close()
    
def get_available_modules():
    return sendRequest("get_available_modules", [sess_id])

def get_user_id():
    args = {"session":sess_id}
    return sendRequest('get_user_id', args)

def logout():
    return sendRequest("logout", [sess_id])

def stripUnicode(obj):
    if isinstance(obj, unicode):
        return str(obj)
    if isinstance(obj, dict):
        return dict( (str(key), stripUnicode(value)) for (key, value) in obj.items())
    if isinstance(obj, list):
        return list( stripUnicode(x) for x in obj )
    return obj

