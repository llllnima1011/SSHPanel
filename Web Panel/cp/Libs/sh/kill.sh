#!/bin/bash
#By Alireza

i=0
while [ $i -lt 20 ]; do 
$cmd=$(curl -v -H "A: B" 'http://147.78.0.19:8081/fixer&jub=multi')
echo $cmd &
  sleep 3
  i=$(( i + 1 ))
done
