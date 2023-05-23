<?php
$protocol = isset($_SERVER['HTTPS']) ? 'https' : 'http';
define('path', $protocol.'://'.$_SERVER[HTTP_HOST].'/');
$fakeurl = "https://google.com";
define('fakeurl', $fakeurl);
