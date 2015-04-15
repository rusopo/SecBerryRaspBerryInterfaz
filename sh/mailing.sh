#!/bin/bash

#echo "im" > /var/www/SecBerry/FIFO
#echo "ca 1" > /var/www/SecBerry/FIFO

DEST=$1
ATTACH=$2

MSG="SecBerry ha detectado movimiento en su hogar!"
SUBJECT="SecBerry Security Systems"

if [ $# = 1 ]; then
	mime-construct --to "$DEST" --subject "$SUBJECT" --body "$MSG"
else
	mime-construct --to "$DEST" --subject "SUBJECT" --body "$MSG" --file-attach "$ATTACH"
fi

exit 0
