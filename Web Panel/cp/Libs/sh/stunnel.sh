#!/bin/bash
echo "cert = /etc/stunnel/stunnel.pem
 [openssh]
 accept = $3
 connect = 0.0.0.0:$4
" > /etc/stunnel/stunnel.conf