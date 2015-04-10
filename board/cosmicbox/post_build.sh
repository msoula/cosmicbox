#!/bin/sh
#title       : post_build.sh
#description : this script removes unused services from target directory
#              it should be called just before creating filesystem images
#              (cf System configuration)
#author      : rid
#date        : 19/03/2015
#version     : 0.0
#usage       : post_build.sh <TARGET_DIR> <COSMICBOX_DIR>
#--------------------------------------------------------------------------------

TARGET_DIR=$1

# files to remove (space separated)
FILES="/etc/init.d/S50lighttpd /etc/init.d/S80dnsmasq"
for f in $FILES; do
    [ -f $TARGET_DIR/$f ] && rm -f $TARGET_DIR/$f
done

# symbolic link fsck.vfat
ln -sf /sbin/fsck.fat $TARGET_DIR/sbin/fsck.vfat

# Make sure the exit code is 0
exit 0

