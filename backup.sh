#!/bin/bash

# This bash script is used to backup a user's home directory to /tmp/.

user=$(whoami)
INPUT=/home/$USER
OUTPUT=/tmp/${USER}_home_$(date +%Y-%m-%d_%H%M%S).tar.gz

tar -czf $OUTPUT $INPUT
echo "Backup of $INPUT completed! Details about the output backup file:"
ls -l $OUTPUT
