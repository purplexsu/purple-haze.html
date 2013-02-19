#!/bin/bash
#

cd ~/www
find -name comment-*.html -print | xargs zip -g comment.zip
zip -g comment.zip comment.inc
zip -g comment.zip comments.inc
mv comment.zip cmdcmd/
