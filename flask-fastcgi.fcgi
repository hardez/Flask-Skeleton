!/path/to/virtualenv/python2.7

# This is the path relative to /
RELATIVE_WEB_URL_PATH =  '/MyApp'

import os
# This points to the application on the local filesystem.
LOCAL_APPLICATION_PATH = os.path.expanduser('~') + '/PyApps/MyApp'

import sys
sys.path.insert(0, LOCAL_APPLICATION_PATH)

from flup.server.fcgi import WSGIServer
from app import app


class ScriptNamePatch(object):
    def __init__(self, app):
        self.app = app

    def __call__(self, environ, start_response):
        environ['SCRIPT_NAME'] = RELATIVE_WEB_URL_PATH
        return self.app(environ, start_response)

app = ScriptNamePatch(app)
app.debug = True

if __name__ == '__main__':
    WSGIServer(app).run()


