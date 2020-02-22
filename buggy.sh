#!/usr/bin/env bash
# cookbook filename: buggy
#
#set -x
result=$1
[ $result = 1 ] && { echo "Result is 1; excellent." } || { echo "Uh-oh, ummm, RUN AWAY! " }; exit 0;
} ; exit 120; }
