
BUILDROOT_DIR := buildroot-2015.02
TOP := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

all: configure build

# download buildroot and configure with cosmicbox config
configure:
	cd $(BUILDROOT_DIR) && $(MAKE) BR2_EXTERNAL=$(TOP) cosmicbox_defconfig

# start buildroot build process
build: configure
	cd $(BUILDROOT_DIR) && $(MAKE)

menuconfig: configure
	cd $(BUILDROOT_DIR) && $(MAKE) menuconfig

linux-menuconfig: configure
	cd $(BUILDROOT_DIR) && $(MAKE) linux-menuconfig

clean:
	cd $(BUILDROOT_DIR) && $(MAKE) clean

