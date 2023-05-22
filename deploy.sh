#!/bin/bash

git stash
GIT=`git pull`
cp mail.php /var/www/html
