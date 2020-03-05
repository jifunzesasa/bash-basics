#!/bin/bash
echo -n "Enter the name of a country: "
read COUNTRY
echo -n "The official language of $COUNTRY is "
case $COUNTRY in
Lithuania)
    echo -n "Lithuanian"
    ;;
Romania | Moldova)
    echo -n "Romanian"
    ;;
Italy | "San Marino" | Switzerland | "Vatican City")
    echo -n "Italian"
    ;;
*)
    echo -n "unknown"
    ;;
esac
