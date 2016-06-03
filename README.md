# elastic-heart
This module is going to be the heart of various online/offline events.

>The project is based on the laravel web framework for PHP.

## Installing Composer

Run these commands to globally install composer on your system:
###Step 1

  `curl -sS https://getcomposer.org/installer | php mv composer.phar /usr/local/bin/composer`


**Notes**
---
_refer to these if you hit any  roadblocks._
1. Failures due to permissions occur,then run the *mv* line again with *sudo*.

A quick copy-paste version including sudo:

  `curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer`

2. On some versions of OSX the */usr directory* does not exist by default. If you receive the error then use :
  
  `"/usr/local/bin/composer: No such file or directory" `

  and after that you must *create the directory manually* before proceeding:
  
  ` mkdir -p /usr/local/bin.`

*Note: For information on changing your PATH, please read the Wikipedia article and/or use Google.*

###Step 2
To check if composer is installed properly , do :
  `composer -v`
  _It will tell you the version of composer you are using_

## Setting Up The Project
After composer has been installed you can just run `composer install` in the projects root directory.

_This will install all the dependencies of the project and you are ready to go._

## Directory Structure
---

 - frontend : contains the static template (views) of the project .
 - assets/img , resources : contains the media objects used in the project .
 - bootstrap : source code of bootstrap css and js .
