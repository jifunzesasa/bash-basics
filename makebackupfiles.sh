#!/bin/bash

# make copies of all files in a directory
LIST=$(ls)
for i in $LIST; do
    ORIG=$i
    DEST=$i.old
    cp $ORIG $DEST
    echo "copied $i"
done
