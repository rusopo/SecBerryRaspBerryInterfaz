#!/bin/bash

V_W_ANT=$1
V_W_NEW=$2
V_H_ANT=$3
V_H_NEW=$4

if [ $# = "4" ]; then

	sed -i "48 s/$V_W_ANT/$V_W_NEW/g" /etc/raspimjpeg
	sed -i "49 s/$V_H_ANT/$V_H_NEW/g" /etc/raspimjpeg

fi

exit 0