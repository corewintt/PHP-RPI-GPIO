PHP-RPI-GPIO
============

PHP class for RasberryPI GPIO

простая обертка для управления GPIO через связку  nginx + php-fpm

для работы необходимо настроить 



################################
/etc/nginx/nginx.conf 

user pi;

################################

################################
/etc/php5/fpm/pool.d/www.conf


user = pi
group = gpio
################################
