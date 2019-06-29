#!/bin/bash

echo 'Container running...'

apt-get -y update

/usr/sbin/apache2ctl -D FOREGROUND
