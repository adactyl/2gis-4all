#!/usr/bin/env bash

apt-get install -y software-properties-common python-software-properties
add-apt-repository ppa:chris-lea/node.js
apt-get update
apt-get install -y python g++ make nodejs git