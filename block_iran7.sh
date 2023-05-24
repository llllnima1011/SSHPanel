#!/bin/sh
#Alireza
sudo apt-get update; sudo apt-get -y upgrade &
sudo apt-get install curl unzip perl -y &
wait
sudo apt-get install xtables-addons-common -y &
wait
sudo apt-get install libtext-csv-xs-perl libmoosex-types-netaddr-ip-perl -y &
wait
sudo mkdir /usr/share/xt_geoip
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
iptables -m geoip -h
printf "\n Download Success GEOIP Library  \n"
