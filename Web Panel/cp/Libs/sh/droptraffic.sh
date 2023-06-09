#!/bin/bash
data=( `ps aux | grep -i dropbear | awk '{print $2}'`);

for PID in "${data[@]}"
do
        #echo "check $PID";
        NUM=`cat /var/log/auth.log | grep -i dropbear | grep -i "Password auth succeeded" | grep "dropbear\[$PID\]" | wc -l`;
        USER=`cat /var/log/auth.log | grep -i dropbear | grep -i "Password auth succeeded" | grep "dropbear\[$PID\]" | awk '{print $10}'`;
        IP=`cat /var/log/auth.log | grep -i dropbear | grep -i "Password auth succeeded" | grep "dropbear\[$PID\]" | awk '{print $12}'`;
        if [ $NUM -eq 1 ]; then
               sudo rm -rf /var/www/html/cp/storage/log/dropout.json
               sudo nethogs -j -d 19 -v 3 > /var/www/html/cp/storage/log/dropout.json &
        fi
done








