#!/bin/bash

if [ $# = "4" ]; then
   V_IMG_W=$1
   V_IMG_H=$2
   V_VID_W=$3
   V_VID_H=$4
   if [ ${#V_IMG_H} = "3" ]; then
	V_IMG_H="0$V_IMG_H"
   fi
   if [ ${#V_IMG_W} = "3" ]; then
	V_IMG_W="0$V_IMG_W"
   fi
   if [ ${#V_VID_H = "3" ]; then
	V_VID_H="0$V_VID_H"
   fi
   if [ ${#V_VID_W} = "3" ]; then
	V_VID_W="0$V_VID_W"
   fi

   echo "px $V_VID_W $V_VID_H 25 25 $V_IMG_W $V_VID_H" > /var/www/SecBerry/FIFO

fi

exit 0
