#!/usr/bin/env bash

git pull origin master
php -f bin/magento setup:upgrade
php -f bin/magento cache:flush
php bin/magento setup:static-content:deploy -f
chmod -R 777 .
