PHP-RPI-GPIO
============

PHP class for RasberryPI GPIO

простая обертка для управления ГПИО пинами через связку  nginx + php-fpm

для работы неоюходимо настроить 



################################
/etc/nginx/nginx.conf 

user pi;

################################

################################
/etc/php5/fpm/pool.d/www.conf


user = pi
group = gpio
################################
