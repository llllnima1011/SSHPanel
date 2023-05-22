#!/bin/bash
pwd=`dirname $0`

read -e -p "Target directory: " -i "/var/www/html" dir
dir=${dir:-"/var/www/html"}

read -e -p "Database: " -i "wordpress" db
db=${db:-"wordpress"}

if [ ! -d "$dir" ]; then
	sudo mkdir -p $dir
fi
sudo mysql -e "CREATE DATABASE IF NOT EXISTS $db;"

cd $dir
sudo wget http://wordpress.org/latest.zip
sudo unzip latest.zip > /dev/null

sudo rm -rf example

sudo mv wordpress example

sudo chown -R www-data:www-data $dir
sudo chmod -R 775 $dir

u=$SUDO_USER
if [ -z $u ]; then
	u=$USER
fi

if !(groups $u | grep >/dev/null www-data); then
	sudo adduser $u www-data
fi

echo ""
echo "Install Wordpress complete!"
echo ""
