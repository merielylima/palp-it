#!/usr/bin/bash

cd /var/www/html
rm -rf palp-it/
git clone http://github.com/merielylima/palp-it
chown -R www-data:www-data palp-it/
mysql -u root -p -e "DROP DATABASE palpit;"
mysql -u root -p -e "CREATE DATABASE palpit;"
mysql -p palpit < palp-it/bd/Modelo_Atual.sql
sed -i 's/upload_max_filesize.*/upload_max_filesize = 100M/g' /etc/php/7.4/apache2/php.ini 
a2disconf palpit-env.conf
rm /etc/apache2/conf-available/palpit-env.conf
echo -n Entrar o email do palpit:  
read email
echo -n Entrar a senha:  
read -s senha
echo
echo "SetEnv PALPIT_EMAIL $email" > /etc/apache2/conf-available/palpit-env.conf
echo "SetEnv PALPIT_SENHA $senha" >> /etc/apache2/conf-available/palpit-env.conf
a2enconf palpit-env.conf
systemctl reload apache2
python3 -m nltk.downloader all