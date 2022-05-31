#!/usr/bin/bash

cd /var/www/html
rm -rf palp-it/
git clone http://github.com/merielylima/palp-it
chown -R www-data:www-data palp-it/
mysql -u root -p -e "DROP DATABASE palpit;"
mysql -u root -p -e "CREATE DATABASE palpit;"
mysql -p palpit < palp-it/bd/Modelo_Atual.sql
sed -i 's/upload_max_filesize.*/upload_max_filesize = 100M/g' /etc/php/7.4/apache2/php.ini 

