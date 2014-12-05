#!/bin/bash

sudo modprobe bcm2835-v4l2

/home/pi/mjpg-streamer/mjpg_streamer -i "/home/pi/mjpg-streamer/input_uvc.so" -o "/home/pi/mjpg-streamer/output_http.so -w /home/pi/mjpg-streamer/www" &
