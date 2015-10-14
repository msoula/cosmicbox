
BUILDROOT_DIR := buildroot-2015.02
TOP := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

PATCH := patch
BUILDROOT_HOSTAPD_PATCH := buildroot-hostapd-drv-rtw.patch

PULSAR_HOME := pulsar-content
PULSAR_DEPLOY := board/cosmicbox/cosmicboxfs/www

all: deploy-content build

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

clean-content:
	-rm -rf $(PULSAR_DEPLOY)/*

deploy-content: clean-content
	cp -rf -t $(PULSAR_DEPLOY) $(PULSAR_HOME)/app $(PULSAR_HOME)/app.js $(PULSAR_HOME)/public
	ln -sf /usr/lib/node_modules $(PULSAR_DEPLOY)/node_modules

menuconfig: configure
	cd $(BUILDROOT_DIR) && $(MAKE) menuconfig

linux-menuconfig: configure
	cd $(BUILDROOT_DIR) && $(MAKE) linux-menuconfig

clean: configure clean-content
	cd $(BUILDROOT_DIR) && $(MAKE) clean

