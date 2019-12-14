#!/bin/sh
# Author : AlphaOlomi
# Copyright (c) AlphaOlomi.com
# Script follows here:

VAR1="Welcome"
VAR2=100
NAME="Zara Ali"
# readonly NAME
# unset NAME

echo "What is your name?"
# read PERSON
# echo "Hello, $PERSON"


echo "File Name: $0"
# echo "First Parameter : $1"
# echo "Second Parameter : $2"
# echo "Second Parameter : $3"
# echo "Quoted Values: $@"
# echo "Quoted Values: $*"
# echo "Total Number of Parameters : $#"


# for TOKEN in $*
# do
# echo $TOKEN
# done


NAME[0]="Zara"
NAME[1]="Qadir"
NAME[2]="Mahnaz"
NAME[3]="Ayan"
NAME[4]="Daisy"


NAME[0]="Zara"
NAME[1]="Qadir"
NAME[2]="Mahnaz"
NAME[3]="Ayan"
NAME[4]="Daisy"
echo "First Index: ${NAME[0]}"
echo "Second Index: ${NAME[1]}"
