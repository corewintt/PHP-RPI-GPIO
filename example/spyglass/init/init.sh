#!/bin/bash
sudo modprobe bcm2835-v4l2
/home/pi/mjpg-streamer/mjpg_streamer -i "/home/pi/mjpg-streamer/input_uvc.so -y -r 640x480 -f 15" -o "/home/pi/mjpg-streamer/output_http.so -w /home/pi/mjpg-streamer/www2" -b
