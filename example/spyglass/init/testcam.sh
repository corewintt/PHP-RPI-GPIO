#!/bin/bash
sudo modprobe bcm2835-v4l2
xawtv /dev/video0  -geometry 240x240 -b 2 -v2 -remote -n -m
