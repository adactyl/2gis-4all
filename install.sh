#!/usr/bin/env bash

apt-get update
apt-get remove openjdk*
apt-get install software-properties-common python-software-properties
add-apt-repository ppa:chris-lea/postgresql-9.3
add-apt-repository ppa:chris-lea/node.js
add-apt-repository ppa:webupd8team/java
apt-get update
apt-get install mc vim python g++ make nodejs git php5-cli php5-fpm nginx postgresql-9.3 pgadmin3 php5-pgsql oracle-java7-installer

wget https://phar.phpunit.de/phpunit.phar
chmod +x phpunit.phar
mv phpunit.phar /usr/local/bin/phpunit

mkdir /var/www
chown student:www-data /var/www
echo "<?php phpinfo(); " > /var/www/index.php

service nginx restart
