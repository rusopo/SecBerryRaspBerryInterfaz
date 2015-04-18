#!/bin/bash

F_W_ANT=$1
F_W_NEW=$2
F_H_ANT=$3
F_H_NEW=$4

if [ $# = "4" ]; then

	sed -i "58 s/$F_W_ANT/$F_W_NEW/g" /etc/raspimjpeg
	sed -i "59 s/$F_H_ANT/$F_H_NEW/g" /etc/raspimjpeg

fi

exit 0