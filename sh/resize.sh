#!/bin/bash

V_LAST="`ls -Art /var/www/SecBerry/media/images | tail -n 1`"
V_NEW="RESIZED$V_LAST"
convert -resize 370x200 "/var/www/SecBerry/media/images/$V_LAST" "$V_NEW"

mv "$V_NEW" "/var/www/SecBerry/media/preview/$V_LAST"

exit 0
