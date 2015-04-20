#!/bin/bash

R_VID_W=$1
R_VID_H=$2
R_IMG_W=$3
R_IMG_H=$4
V_W_ANT=$5
V_W_NEW=$6
V_H_ANT=$7
V_H_NEW=$8

if [ $# = "8" ]; then

	sed -i "48 s/$V_W_ANT/$V_W_NEW/g" /etc/raspimjpeg
	sed -i "49 s/$V_H_ANT/$V_H_NEW/g" /etc/raspimjpeg

	echo "px $R_VID_W $R_VID_H 25 25 $R_IMG_W $R_IMG_H" > /var/www/SecBerry/FIFO
fi

exit 0

