#!/usr/bin/sh
#sudo -u postgres psql
echo "create database $1;
create user admin with password 'admin';
grant all privileges on database $1 to admin;" >> tmp

sudo -u postgres psql < tmp
