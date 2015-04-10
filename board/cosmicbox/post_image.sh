#!/bin/sh
#title       : post_image.sh
#description : copy cosmicbox's second partition content into images directory
#author      : rid
#date        : 19/03/2015
#version     : 0.0
#usage       : post_image.sh <IMAGE_DIR> <COSMICBOX_DIR>
#--------------------------------------------------------------------------------

die() {
    echo "FATAL: $1"
    exit 1
}

[ 2 -ne $# ] && die "invalid number of parameters $# (expected 2)"

IMAGE_DIR=$1
COSMICBOX_HOME=$2

# modify cmdline.txt file with custom parameters
echo "dwc_otg.fiq_fix_enable=1 sdhci-bcm2708.sync_after_dma=0 dwc_otg.lpm_enable=0 console=tty1 root=/dev/mmcblk0p1 rootdelay=5 rootwait" > $IMAGE_DIR/rpi-firmware/cmdline.txt

# copy cosmicbox fs into image directory
cp -rf "$COSMICBOX_HOME"/board/cosmicbox/cosmicboxfs $IMAGE_DIR

cd $IMAGE_DIR/cosmicboxfs

# create the archive
tar czf $IMAGE_DIR/cosmicboxfs.tar.gz *

cd -

# clean image directory
rm -rf $IMAGE_DIR/cosmicboxfs

# make sure 0 is returned
exit 0

