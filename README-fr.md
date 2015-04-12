# CosmicBox

* v0.1 (Mathieu Soula - msoula@gmx.com)
* based on LibraryBox v2.0 (Jason Griffey - griffey@gmail.com)
* based on PirateBox (David Darts - daviddarts@gmail.com)

## INSTALLATION À PARTIR DE GIT

Le projet CosmicBox est associé au projet buildroot. Il est nécessaire de
saisir la commande suivante pour clone ce repo:

    git clone --recursive https://github.com/msoula/cosmicbox.git

## QU'EST-CE QUE C'EST ?

Une PirateBox est un dispositif électronique souvent composé d'un routeur
et d'un dispositif de stockage d'information, créant un réseau sans fil qui
permet aux utilisateurs qui y sont connectés d'échanger des fichiers
anonymement et de manière locale. Les PirateBox sont à l'origine destinées
à échanger librement des données libres du domaines public ou sous licence
libre. Les logiciels utilisés pour la mise en place d'une PirateBox sont
majoritairement open source, voir libres.
Plus d'informations: http://piratebox.cc/start

Le projet LibraryBox est un fork du projet PirateBox pour les boîtiers TP-LINK
MR 3020. Une LibraryBox est un outil de distribution de données numériques à
destination du monde éducatif, des médiathèques, ou encore des milieux
médicaux.
Plus d'informations: http://www.librarybox.us

Le projet CosmicBox est né du besoin de disposer d'une version fonctionnelle
de LibraryBox sur RaspberryPi. Ce projet est né à l'initiative de
l'association Les Chats Cosmiques.
Plus d'informations: http://cosmicbox.leschatscosmiques.net

## À QUOI ÇA SERT ?

Pour faire vite, une CosmicBox est une LibraryBox pour RaspberryPi.

Le projet permet de générer une distribution RaspberryPi spécialement
calibrée pour embarquer une LibraryBox. Une attention particulière a été portée
sur la fiabilité du système et le paramétrage de la LibraryBox. Mis à part ça,
la CosmicBox propose les mêmes fonctionnalités qu'une LibraryBox:
 - partage de fichiers;
 - chat entre usagers;
 - relevé de statistiques d'utilisation.

## ARCHITECTURE DE LA COSMICBOX

Une CosmicBox est architecturée autour de deux partitions générées par
buildroot.

La première partition contient le noyau lié à un système de fichiers standard.
Ces deux éléments sont générés par buildroot (2015.02).

La seconde partition contient le système de fichiers relatif à la LibraryBox.

    /cosmicbox
    +-- bin/                      [0]
    +-- cosmicbox                 [1]
    +-- cosmicbox.conf            [2]
    +-- etc/                      [3]
    +-- etc.templates/            [4]
    +-- lib/                      [5]
    `-- www/                      [6]

[0] répertoire contenant des applications LibraryBox (shoutbox, ...).
[1] script de démarrage/arrêt de la LibraryBox (lancé par init).
[2] fichier de configuration de la LibraryBox.
[3] répertoire dans lequel sont déployés les fichiers de configuration de la
    LibraryBox lors de son démarrage.
[4] répertoire contenant les templates de fichiers de configuration de la
    LibraryBox. Au démarrage de la LibraryBox, les fichiers sont complétés
    puis déplacés dans le répertoire /cosmicbox/etc
[5] répertoire contenant des libraries nécessaires à la LibraryBox.
[6] répertoire contenant une partie du site web de la LibraryBox (l'autre
    partie se trouve sur le support de stockage).

Au démarrage du système, une fois les daemons démarrés, le script
/cosmicbox/cosmicbox est exécuté par le processus init.
Les fichiers templates sont complétés à partir des informations renseignées
dans le fichier /cosmicbox/cosmicbox.conf et copiés dans le répertoire
/cosmicbox/etc. Si tous les éléments nécessaires sont réunis (clé wifi,
support de stockage), la LibraryBox est alors lancée.

## CONFIGURATION DE LA COSMICBOX

Par défaut, le projet CosmicBox est configuré pour ne reconnaître que les
antennes Wifi USB WiPi. Il est toutefois possible de configurer buildroot
pour ajouter une autre antenne wifi.

Dans le répertoire racine du projet, saisir tout d'abord la commande:

    make linux-menuconfig

Dans Device Drivers > Network device support > Wireless LAN, sélectionner
le driver correspondant à votre antenne WiFi.

Certains drivers nécessitent un bout de code propriétaire appelé "firmware"
pour pouvoir correctement fonctionner. Si tel est le cas de votre antenne,
saisir la commande:

    make menuconfig

Dans Target packages > Hardware handling > Firmware > WiFi firmware,
sélectionner le firmware requis pour votre driver (cocher Linux firmware
pour accéder au menu WiFi firmware).

Pour modifier la configuration de base de la LibraryBox, éditer le fichier
board/cosmicbox/cosmicboxfs/cosmicbox.conf.

## COMPILATION DE LA COSMICBOX

Dans le répertoire racine du projet, saisir la commande:

    make

Après la compilation, vous obtenez cette arborescence:

    buildroot-2015.02/output/images
    +-- cosmicboxfs.tar.gz
    +-- rpi-firmware/
    |   +-- bootcode.bin
    |   +-- cmdline.txt
    |   +-- config.txt
    |   +-- fixup.dat
    |   `-- start.elf
    `-- zImage

## PRÉPARATION DE LA CARTE SD

Pour plus d'informations, visiter
http://elinux.org/RPi_Advanced_Setup#Advanced_SD_card_setup

Il est nécessaire de créer deux partitions sur la carte SD:
 - la 1ère partition en fat32, bootable;
 - la 2nde partition en ext2.

Remarque: Aujourd'hui les cartes SD ont des capacités relativement
          importantes. Il n'est pas nécessaire d'utiliser l'intégralité de
          l'espace disponible.
          Nous recommandons une taille de 50MiB pour la première partition,
          et une taille de 50MiB pour la seconde partition.

## INSTALLATION DU SYSTÈME SUR LA CARTE SD

Pour monter les partitions (modifier 'sdX' pour correspondre à votre carte SD):

    sudo mount /dev/sdX1 /mnt/mountpointboot
    sudo mount /dev/sdX2 /mnt/mountpointlibrarybox

A la racine de la première partition, le RaspberryPi s'attend à trouver les
fichiers suivants:

    * bootcode.bin
    * cmdline.txt
    * config.txt
    * fixup.dat
    * start.elf
    * zImage

A la racine de la seconde partition, décompresser l'archive contenant le
système de fichiers pour la LibraryBox:

    tar xzf cosmicboxfs.tar.gz -C /mnt/mountpointlibrarybox

Démonter toutes les partitions:

    sudo umount /mnt/mountpointboot
    sudo umount /mnt/mountpointlibrarybox

Retirer votre carte SD.

## INSTALLATION DE LA LIBRARYBOX SUR LE SUPPORT DE STOCKAGE

Il est nécessaire de créer une partition fat32 sur le support de stockage.

Pour monter cette partition (modifier 'sdX' pour correspondre à votre support
de stockage):

    sudo mount /dev/sdX1 /mnt/mountpoint

Copier le contenu du répertoire librarybox dans /mnt/mountpoint.

Démonter la partition:

    sudo umount /mnt/mountpoint

Retirer le support de stockage.

## DÉMARRAGE DE LA COSMICBOX

Insérer la carte SD dans votre RaspberryPi. Branchez en même temps votre
antenne WiFi, ainsi que le support de stockage contenant la seconde partie
du site LibraryBox. Branchez votre RaspberryPi. Le nouveau système devrait
démarrer.
