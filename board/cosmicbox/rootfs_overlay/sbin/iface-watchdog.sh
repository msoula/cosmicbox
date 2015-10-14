#!/bin/sh
#title       : iface-watchdog.sh
#description : <insert description>
#author      : rid
#date        : 16/03/2015
#version     : 0.0
#usage       : iface-watchdog.sh <IFACE_NAME>
#-------------------------------------------------------------------------------

DEBUG=0
TESTIFACE="cat /proc/net/dev | grep $1 > /dev/null"

die() {
    echo "FATAL: $1"
    exit 1
}

[ -n "$1" ] || die "Missing iface name"

while true; do

    [ 0 -ne $DEBUG ] && echo "Checking interface $1..."
    eval $TESTIFACE
    if [ 0 -eq $? ]; then
        echo "Interface $1 is mounted..."

        # iface is connected
        /sbin/ifup $1

        # wait while iface connection
        eval $TESTIFACE
        while [ 0 -eq $? ]; do
            sleep 1
            [ 0 -ne $DEBUG ] && echo "Checking interface $1..."
            eval $TESTIFACE
        done

    else
        echo "Interface $1 is unmounted..."

        # iface is not connected
        /sbin/ifdown $1

        # wait while iface disconnection
        eval $TESTIFACE
        while [ 0 -ne $? ]; do
            sleep 1
            [ 0 -ne $DEBUG ] && echo "Checking interface $1..."
            eval $TESTIFACE
        done

    fi

done

exit 0

