#!/usr/bin/env bash

apt-get update
apt-get remove openjdk*
apt-get install -y software-properties-common python-software-properties
add-apt-repository ppa:chris-lea/postgresql-9.3
add-apt-repository ppa:chris-lea/node.js
add-apt-repository ppa:webupd8team/java
apt-get update
apt-get install -y mc python g++ make nodejs git php5-cli php5-fpm nginx postgresql-9.3 pgadmin3 php5-pgsql oracle-java7-installer

wget https://phar.phpunit.de/phpunit.phar
chmod +x phpunit.phar
mv phpunit.phar /usr/local/bin/phpunit

mkdir /var/www
chown root:www-data /var/www
echo "<?php phpinfo(); " > /var/www/index.php

echo "
server {
        listen   80;
        root /var/www;
        index index.html index.htm index.php;
        server_name localhost;

        location / {
                try_files $uri $uri/ /index.html;
        }

        #error_page 404 /404.html;
        #error_page 500 502 503 504 /50x.html;
        #location = /50x.html {
        #       root /usr/share/nginx/www;
        #}

        location ~ \.php$ {
        #       fastcgi_split_path_info ^(.+\.php)(/.+)$;
        #       # NOTE: You should have \"cgi.fix_pathinfo = 0;\" in php.ini
                fastcgi_pass 127.0.0.1:9000;
                fastcgi_index index.php;
                include fastcgi_params;
        }
}
" > /etc/nginx/sites-enabled/default
service nginx restart
