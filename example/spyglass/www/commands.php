<?php
include '../../../lib/GPIO.php';
# end up 
$pin2 = GPIO::get(2);
$pin2->setMode(GPIO::MODE_OUT);

#end down
$pin3 = GPIO::get(3);
$pin3->setMode(GPIO::MODE_OUT);


$pin2->writeDigital(0);
$pin3->writeDigital(0);

$pin3->writeDigital(true);

usleep(100000);
$pin2->writeDigital(0);
$pin3->writeDigital(0);
