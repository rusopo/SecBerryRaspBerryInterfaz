#!/bin/bash

if [ $# = "1" ]; then
	file =$1
	sudo rm /var/www/SecBerry/media/"$file"
fi

exit 0
