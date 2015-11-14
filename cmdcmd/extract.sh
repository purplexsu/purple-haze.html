#!/bin/bash
#

cd ~/public_html
mv cmdcmd/update.zip .
unzip -o update.zip
chmod +x index.html
chmod +x comments.html
rm -f update.zip
