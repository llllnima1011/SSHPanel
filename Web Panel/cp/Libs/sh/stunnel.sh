#!/bin/bash
echo "cert = /etc/stunnel/stunnel.pem
[dropbear]
 accept = $1
 connect = 0.0.0.0:$2
 [openssh]
 accept = $3
 connect = 0.0.0.0:$4
" > /etc/stunnel/stunnel.conf