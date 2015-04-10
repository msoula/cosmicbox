#!/bin/sh
#title       : iface-watchdog.sh
#description : <insert description>
#author      : rid
#date        : 16/03/2015
#version     : 0.0
#usage       : iface-watchdog.sh <IFACE_NAME>
#-------------------------------------------------------------------------------

TESTIFACE="cat /proc/net/dev | grep $1 > /dev/null"

die() {
    echo "FATAL: $1"
    exit 1
}

[ -n "$1" ] || die "Missing iface name"

while true; do

    eval $TESTIFACE
    if [ 0 -eq $? ]; then

        # iface is connected
        /sbin/ifup $1

        # wait while iface connection
        eval $TESTIFACE
        while [ 0 -eq $? ]; do
            sleep 1
            eval $TESTIFACE
        done

    else

        # iface is not connected
        /sbin/ifdown $1

        # wait while iface disconnection
        eval $TESTIFACE
        while [ 0 -ne $? ]; do
            sleep 1
            eval $TESTIFACE
        done

    fi

done

exit 0

