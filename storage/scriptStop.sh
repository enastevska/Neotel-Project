#!/bin/bash
PIDS=$(pgrep -f ffmpeg)
for PID in $PIDS
do
kill -9 $PID
done

