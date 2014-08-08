#!/usr/bin/env bash

apt-get update
apt-get remove openjdk*
apt-get install -y software-properties-common python-software-properties
add-apt-repository ppa:chris-lea/postgresql-9.3
add-apt-repository ppa:chris-lea/node.js
add-apt-repository ppa:webupd8team/java
apt-get update
apt-get install -y mc vim python g++ make nodejs git php5-cli php5-fpm nginx postgresql-9.3 pgadmin3 php5-pgsql oracle-java7-installer

wget https://phar.phpunit.de/phpunit.phar
chmod +x phpunit.phar
mv phpunit.phar /usr/local/bin/phpunit

mkdir /var/www
chown student:www-data /var/www
echo "<?php phpinfo(); " > /var/www/index.php

cat <<EOT > /etc/nginx/fastcgi_params
fastcgi_param   QUERY_STRING              $query_string;
fastcgi_param   REQUEST_METHOD    $request_method;
fastcgi_param   CONTENT_TYPE              $content_type;
fastcgi_param   CONTENT_LENGTH    $content_length;

fastcgi_param   SCRIPT_FILENAME   $request_filename;
fastcgi_param   SCRIPT_NAME                 $fastcgi_script_name;
fastcgi_param   REQUEST_URI                 $request_uri;
fastcgi_param   DOCUMENT_URI              $document_uri;
fastcgi_param   DOCUMENT_ROOT             $document_root;
fastcgi_param   SERVER_PROTOCOL   $server_protocol;

fastcgi_param   GATEWAY_INTERFACE       CGI/1.1;
fastcgi_param   SERVER_SOFTWARE         nginx/$nginx_version;

fastcgi_param   REMOTE_ADDR                 $remote_addr;
fastcgi_param   REMOTE_PORT                 $remote_port;
fastcgi_param   SERVER_ADDR                 $server_addr;
fastcgi_param   SERVER_PORT                 $server_port;
fastcgi_param   SERVER_NAME                 $server_name;

fastcgi_param   HTTPS                           $https;

# PHP only, required if PHP was built with --enable-force-cgi-redirect
fastcgi_param   REDIRECT_STATUS         200;
EOT

cat <<EOT > /etc/nginx/sites-enabled/default
server {
        listen   *:80;
        index index.html index.htm index.php;
        server_name localhost;

        location / {
                root /var/www;
                try_files $uri $uri/ /index.php index.php$is_args$args;
                fastcgi_pass 127.0.0.1:9000;
                include /etc/nginx/fastcgi_params;
        }

        #error_page 404 /404.html;
        #error_page 500 502 503 504 /50x.html;
        #location = /50x.html {
        #       root /usr/share/nginx/www;
        #}

        location ~ \.php$ {
               fastcgi_split_path_info ^(.+\.php)(/.+)$;
        #       # NOTE: You should have \"cgi.fix_pathinfo = 0;\" in php.ini
                root /var/www;
                try_files $uri $uri/ /index.php index.php$is_args$args;
                include /etc/nginx/fastcgi_params;
                fastcgi_pass 127.0.0.1:9000;
                fastcgi_index index.php;
                fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
                fastcgi_param APP_ENV dev;
                include fastcgi_params;
        }
        sendfile off;
}
EOT

service nginx restart
