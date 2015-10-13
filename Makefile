
BUILDROOT_DIR := buildroot-2015.02
TOP := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

PATCH := patch
BUILDROOT_HOSTAPD_PATCH := buildroot-hostapd-drv-rtw.patch

all: build

# configure buildroot the first time make is called
configure:
ifeq (,$(wildcard .stamp_configured))
	cd $(BUILDROOT_DIR) && $(PATCH) -p1 < ../$(BUILDROOT_HOSTAPD_PATCH)
	cd $(BUILDROOT_DIR) && $(MAKE) BR2_EXTERNAL=$(TOP) cosmicbox_defconfig
	touch .stamp_configured
endif

# start buildroot build process
build: configure
	cd $(BUILDROOT_DIR) && $(MAKE)

menuconfig: configure
	cd $(BUILDROOT_DIR) && $(MAKE) menuconfig

linux-menuconfig: configure
	cd $(BUILDROOT_DIR) && $(MAKE) linux-menuconfig

clean:
	cd $(BUILDROOT_DIR) && $(MAKE) clean

