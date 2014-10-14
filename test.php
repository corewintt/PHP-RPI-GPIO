<?php

include 'lib/GPIO.php';

# end up 
$pin2 = GPIO::get(2);
$pin2->mode(GPIO::MODE_OUT);

#end down
$pin3 = GPIO::get(3);
$pin3->mode(GPIO::MODE_OUT);


$pin2->writeDigital(1);
sleep(5);
$pin2->writeDigital(0);

#var_dump($pin);
#$pin3->signalPWM(1000,99,100);

