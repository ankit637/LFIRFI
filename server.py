import socket

host = '192.168.92.172'
port = 10112

server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
server_socket.bind((host, port))
server_socket.listen(1)

print(f'Listening for connections on {host}:{port}')

client_socket, addr = server_socket.accept()
print(f'Connection from: {addr}')

while True:
    command = input("Enter command (or 'exit' to quit): ")

    if command == 'exit':
        break

    client_socket.send(command.encode())
    result = client_socket.recv(1024).decode()
    print(f'Result:\n{result}')

client_socket.close()
