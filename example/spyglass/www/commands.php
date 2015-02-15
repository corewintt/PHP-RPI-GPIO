<?php
include '../../../lib/GPIO.php';
# end up

switch($_GET['command'])
{
    case 'left':

        $pin4 = GPIO::get(4);
        $pin4->setMode(GPIO::MODE_OUT);

#end down
        $pin14 = GPIO::get(14);
        $pin14->setMode(GPIO::MODE_OUT);


        $pin4->writeDigital(0);
        $pin14->writeDigital(0);

        $pin14->writeDigital(TRUE);

        usleep(100000);
        $pin4->writeDigital(0);
        $pin14->writeDigital(0);
        break;

    case 'right':

        $pin4 = GPIO::get(4);
        $pin4->setMode(GPIO::MODE_OUT);

#end down
        $pin14 = GPIO::get(14);
        $pin14->setMode(GPIO::MODE_OUT);


        $pin4->writeDigital(0);
        $pin14->writeDigital(0);

        $pin4->writeDigital(TRUE);

        usleep(100000);
        $pin4->writeDigital(0);
        $pin14->writeDigital(0);
        break;

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
        $start = ($path.'/mjpg-streamer/mjpg_streamer -i "'.$path.'/mjpg-streamer/input_uvc.so -y -r 320x240 -f 15" -o "'.$path.'/mjpg-streamer/output_http.so -w '.$path.'/mjpg-streamer/www2" -b');
        exec($start);
        break;
    case 'stopstream':
        exec('killall mjpg_streamer');
        break;

    case 'foto':
        exec('killall mjpg_streamer');
        usleep(500000);
        $date = date('Y_m_d_H:i:s');
        $dir = __DIR__.'/foto/SPY_'.$date.'.jpg';
        exec('raspistill -vf -hf -o '.$dir);
        break;

}