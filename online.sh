#!/bin/bash


who | cut -d " " -f 1 | sort -u
