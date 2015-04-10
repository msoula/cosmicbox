
TOP := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

all: configure build

# download buildroot and configure with cosmicbox config
configure:
	cd buildroot && $(MAKE) BR2_EXTERNAL=$(TOP) cosmicbox_defconfig

# start buildroot build process
build: configure
	cd buildroot && $(MAKE)

menuconfig: configure
	cd buildroot && $(MAKE) menuconfig

linux-menuconfig: configure
	cd buildroot && $(MAKE) linux-menuconfig

clean:
	cd buildroot && $(MAKE) clean

