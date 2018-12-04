#!/usr/bin/env bash

while true; do
 NMAP=$(nmap -P0 -sT -p3306 db55)
 if [[ $NMAP == *"Host is up"* && $NMAP == *"open"* ]]; then
    echo "connection!!!"
    break
 fi

 sleep 150
 echo "waiting for connection"
done