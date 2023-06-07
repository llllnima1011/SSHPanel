#!/bin/bash
echo "cert = /etc/stunnel/stunnel.pem
 client = no
 socket = a:SO_REUSEADDR=1
 socket = l:TCP_NODELAY=1
 socket = r:TCP_NODELAY=1
 [dropbear]
 accept = $1
 connect = 127.0.0.1:$2
 [openssh]
 accept = $3
 connect = 127.0.0.1:$4
" > /etc/stunnel/stunnel.conf