#!/bin/bash

R_VID_W=$1
R_VID_H=$2
R_IMG_W=$3
R_IMG_H=$4
F_W_ANT=$5
F_W_NEW=$6
F_H_ANT=$7
F_H_NEW=$8

if [ $# = "8" ]; then

	sed -i "58 s/$F_W_ANT/$F_W_NEW/g" /etc/raspimjpeg
	sed -i "59 s/$F_H_ANT/$F_H_NEW/g" /etc/raspimjpeg

	echo "px $R_VID_W $R_VID_H 25 25 $R_IMG_W $R_IMG_H" > /var/www/SecBerry/FIFO
fi

exit 0
