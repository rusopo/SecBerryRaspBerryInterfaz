#/bin/bash

V_BR_ANT=$1
V_BR_NEW=$2
V_CO_ANT=$3
V_CO_NEW=$4
V_RO_ANT=$5
V_RO_NEW=$6

if [ $# = "6" ]; then

	sudo sed -i "15 s/$V_BR_ANT/$V_BR_NEW/g" /etc/raspimjpeg
	sudo sed -i "14 s/$V_CO_ANT/$V_CO_NEW/g" /etc/raspimjpeg
	sudo sed -i "27 s/$V_RO_ANT/$V_RO_NEW/g" /etc/raspimjpeg

	echo "co $V_CO_NEW" > /var/www/SecBerry/FIFO
	echo "br $V_BR_NEW" > /var/www/SecBerry/FIFO
	echo "ro $V_RO_NEW" > /var/www/SecBerry/FIFO

fi

exit 0
