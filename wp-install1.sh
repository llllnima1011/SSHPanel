#!/bin/bash
pwd=`dirname $0`

read -e -p "Target directory: " -i "/var/www/html" dir
dir=${dir:-"/var/www/html"}

read -e -p "Database AND User: " -i "wordpress" db
db=${db:-"wordpress"}

read -e -p "Password User: " -i "Xpanel2023" pass
pass=${pass:-"Xpanel2023"}

if [ ! -d "$dir" ]; then
	sudo mkdir -p $dir
fi
sudo mysql -e "CREATE DATABASE IF NOT EXISTS $db;"
Q1="CREATE DATABASE $db;"
Q2="CREATE USER $db@localhost;"
Q3="SET PASSWORD FOR $db@localhost= PASSWORD('$pass');"
Q4="GRANT ALL PRIVILEGES on $db.* TO $db@localhost;"
Q5="FLUSH PRIVILEGES;"
SQL=${Q1}${Q2}${Q3}${Q4}${Q5}

`mysql -u root -p -e "$SQL"`

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
