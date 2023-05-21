# install geoip addons and update iptables for rpi4

#!/bin/sh

# install addons
apt install xtables-addons-common libnet-cidr-lite-perl libtext-csv-xs-perl libgeoip2-perl -y

modprobe xt_geoip
echo "xt_geoip" | tee -a /etc/modules-load.d/modules.conf

mkdir -p /tmp/geoip
cd /tmp/geoip

# key down your own license key instead of xxx
MON=$(date +"%m")
YR=$(date +"%Y")
wget "https://download.db-ip.com/free/dbip-country-lite-${YR}-${MON}.csv.gz" -O GeoLite2-Country-CSV.zip

# use this command to unzip that downloaded file to a database directory
/usr/lib/xtables-addons/xt_geoip_dl

# move to that db dir
dir="$(ls)"
cd $dir

# compile database  and copy to system
mkdir -p /usr/share/xt_geoip
/usr/lib/xtables-addons/xt_geoip_build -D /usr/share/xt_geoip

# block IP from Russia for an example
iptables -A INPUT -m geoip --src-cc RU -j DROP
service fail2ban restart
service fail2ban status

cd
rm -rf /tmp/geoip

# if everything's fine, it will show iptables update here
iptables -nL
