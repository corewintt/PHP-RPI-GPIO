<?php
include '../../../lib/GPIO.php';
# end up

switch($_GET['command'])
{
    case 'up':

        $pin2 = GPIO::get(2);
        $pin2->setMode(GPIO::MODE_OUT);

#end down
        $pin3 = GPIO::get(3);
        $pin3->setMode(GPIO::MODE_OUT);


        $pin2->writeDigital(0);
        $pin3->writeDigital(0);

        $pin3->writeDigital(TRUE);

        usleep(100000);
        $pin2->writeDigital(0);
        $pin3->writeDigital(0);
        break;
    case 'down':

        $pin2 = GPIO::get(2);
        $pin2->setMode(GPIO::MODE_OUT);

#end down
        $pin3 = GPIO::get(3);
        $pin3->setMode(GPIO::MODE_OUT);


        $pin2->writeDigital(0);
        $pin3->writeDigital(0);

        $pin2->writeDigital(TRUE);

        usleep(100000);
        $pin2->writeDigital(0);
        $pin3->writeDigital(0);
        break;
}