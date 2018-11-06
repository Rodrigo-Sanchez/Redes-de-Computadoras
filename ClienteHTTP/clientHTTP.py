# coding=UTF-8

# Módulos de Python.
import socket
import sys

def processArguments():
    # Recibe la línea de comandos un argumento.
    # la dirección IP del servidor o nombre del dominio.
    arguments = []
    for i in range(1, len(sys.argv), 1):
        arguments.append(sys.argv[i])
    return arguments

def constructHTTPRequest(host_server):
    return HTTP_request

def TCPconnection(host_server, HTTP_request):
    # Crea un socket de TCP.
    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

    # Conexión del cliente al servicio dado,
    # en el puerto 80 para HTTP.
    s.connect((host_server, 80))

    # Mientras reciba infromación del servidor, la guardará 
    # en HTTP_response, e imprimirá en pantalla.
    while True:
        HTTP_response = s.recv(1024)
        if HTTP_response == "":
            break
        print HTTP_response,

    # Una vez que la recepción de información ha terminado
    # se cierra la conexión con el servidor.
    s.close()

    print "\n\nConexión con el servidor finalizada\n"

arguments    = processArguments()
HTTP_request = constructHTTPRequest(*arguments)
TCPconnection(arguments[0], HTTP_request)

""" def main():
    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    s.connect(('google.com', 80))
    request = b'CONNECT google.com HTTP/1.1\n\n'
    s.send(request)
    print(s.recv(4096).decode())

main() """