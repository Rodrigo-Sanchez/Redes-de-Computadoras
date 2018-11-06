# Msubdulos de Python.
import socket
import sys

def main():
    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    s.connect(('google.com', 80))
    request = b'CONNECT google.com HTTP/1.1\n\n'
    s.send(request)
    print(s.recv(4096).decode())

main()