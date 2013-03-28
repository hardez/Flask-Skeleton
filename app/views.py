from app import app
from flask import Flask, session, redirect, url_for, escape, request, render_template, json

# from forms import myForm
# from models import myModel

@app.route('/')
@app.route('/index')
def index():
    return "Hello, World!"