# lnnt-smart-decoder-web
Smart Decoder - OCR - WebApp - written in PHP

Installation and Configuration
------------------------------

Configuration
-------------
1) Create a copy from config/*.ini.sample files as .ini and configure your settings.
2) On your webserver, set the web application root directory to "app" folder.

SSOCR
------
sudo apt-get install libx11-dev
sudo apt-get install libimlib2-dev
wget https://www.unix-ag.uni-kl.de/~auerswal/ssocr/ssocr-2.16.3.tar.bz2
bzip2 -d ssocr-2.16.3.tar.bz2
cd ssocr-2.16.3/
make all
wget wget http://www.unix-ag.uni-kl.de/~auerswal/ssocr/six_digits.png
./ssocr -T six_digits.png


Allow PHP to run exec():
-------------------------
www-data ALL=(ALL) NOPASSWD:ALL
