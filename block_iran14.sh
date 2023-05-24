#!/bin/sh
#Alireza
sudo apt-get install curl unzip perl &
wait
apt install xtables-addons-common libnet-cidr-lite-perl libtext-csv-xs-perl libgeoip2-perl -y
wait
sudo mkdir /usr/share/xt_geoip
sudo mkdir /usr/lib/xtables-addons/
sudo mkdir /usr/lib/xtables-addons/xt_geoip_build
chmod 777 /usr/lib/xtables-addons/xt_geoip_build
wait
MON=$(date +"%m")
YR=$(date +"%Y")

wget https://download.db-ip.com/free/dbip-country-lite-${YR}-${MON}.csv.gz -O /usr/share/xt_geoip/dbip-country-lite.csv.gz
gunzip /usr/share/xt_geoip/dbip-country-lite.csv.gz
/usr/lib/xtables-addons/xt_geoip_build -D /usr/share/xt_geoip/ -S /usr/share/xt_geoip/
rm /usr/share/xt_geoip/dbip-country-lite.csv
modprobe xt_geoip
lsmod | grep ^xt_geoip
wait
printf "\n Download Success GEOIP Library  \n"
