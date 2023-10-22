<?php
$host = '192.168.92.172';
$port = 10112;

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($socket, $host, $port);

// Send command to retrieve flag
socket_write($socket, "get_flag", strlen("get_flag"));

// Receive and print the flag
$flag = socket_read($socket, 1024);
echo "Flag: $flag";

// Close the socket
socket_close($socket);
?>
