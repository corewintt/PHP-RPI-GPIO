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
    case 'startstream':
        #!/bin/bash
        $path = realpath('../../../');
        exec('sudo modprobe bcm2835-v4l2');
        $start = ($path.'/mjpg-streamer/mjpg_streamer -i "'.$path.'/mjpg-streamer/input_uvc.so -y -r 640x480 -f 15" -o "'.$path.'/mjpg-streamer/output_http.so -w '.$path.'/mjpg-streamer/www2" -b');
        var_dump($start);
        syslog($start,$out);
        var_dump($out);
        break;
    case 'stopstream':
        exec('killall mjpg_streamer');
        break;

}