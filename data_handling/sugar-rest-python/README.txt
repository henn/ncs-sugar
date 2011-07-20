Please see attached for the script I wrote as a client. You'll need to change URL at the top to point to yours.

The way I usually run it (with the Python Windows GUI) is:

1.       Load it up in the editor

2.       Go to Run->Run Module

3.       In the python command window, type: login()

a.       Should produce a session ID

4.       Type: get_xml_data()

If you're using a CLI on MacOS or Linux, I would install ipython, then issue:
%run sugar_rest_client.py # loads it into the current context
login()
get_xml_data()