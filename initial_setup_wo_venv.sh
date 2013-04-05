#!/bin/bash

mkdir app/static
cd app/static

curl -O http://twitter.github.com/bootstrap/assets/bootstrap.zip
unzip bootstrap.zip

cd bootstrap
mv css ..
mv js ..
mv img ..
cd ..

rm bootstrap.zip
rmdir bootstrap

cd js

curl -O http://code.jquery.com/jquery-1.9.1.js
