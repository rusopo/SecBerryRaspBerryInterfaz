#!/bin/bash

echo "im" > /var/www/SecBerry/FIFO
sleep 1
/bin/bash /var/www/SecBerry/sh/resize.sh

exit 0
