#!/bin/bash
COUNTRIES="ir"
# ipset - set name
SETNAME="blockallIran"

# iptables blocking rule. adjust to your needs.
# block all ports except webserver
#BLOCKRULE="INPUT -p tcp -m tcp -m multiport -m set -j DROP ! --dports 80,443 --match-set $SETNAME src"
 BLOCKRULE="INPUT -p tcp -m tcp -m multiport -m set -j DROP --match-set $SETNAME src" # block all ports

# install ipset if needed else flush ipset blockallIran and delete exiting rule
which ipset >/dev/null 2>&1
if [ $? -eq 1 ] ; then
  apt-get install ipset -y
  if [ $? -eq 1 ] ; then
    echo 'error - ipset could not be installed'
    exit 1
  fi
else
  /usr/sbin/ipset flush $SETNAME
  /usr/sbin/iptables -D $BLOCKRULE >/dev/null 2>&1
  /usr/sbin/ipset destroy $SETNAME
fi

# create new ipset called $SETNAME
/usr/sbin/ipset -N $SETNAME hash:net

# download ip's into $SETNAME set
for country in $COUNTRIES; do
  echo ""
  echo "Downloading Country Zone: $country.zone"
  echo ""
  wget -O - http://www.ipdeny.com/ipblocks/data/aggregated/$country-aggregated.zone 2>/dev/null | while read ip; do
    /usr/sbin/ipset -A $SETNAME $ip;
  done
done

# double check blockrule is not added to iptables
/usr/sbin/iptables -C $BLOCKRULE >/dev/null 2>&1
if [ $? -eq 1 ] ; then
 # /usr/sbin/iptables -A $BLOCKRULE # Append iptables rule
  /usr/sbin/iptables -I $BLOCKRULE # Prepend iptables rule
fi

# save iptables rules - adjust to your setup and uncomment below
# /usr/sbin/iptables-save > /etc/iptables.up.rules
