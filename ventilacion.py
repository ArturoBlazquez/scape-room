# -*- coding: utf-8 -*-
from hashlib import sha256

print("\n"*40+chr(27) + "[2J") #Pantalla nueva

while 1:
    code = raw_input('Introduzca el código para desactivar la ventilación: ')
    print(chr(27) + "[2J") #Pantalla nueva
        
    if(sha256(code).hexdigest()=='c9818152eec411d1297cd0dc784bb4485a83b4a914ddb84504b50d92645dcc0b'):
        print "Ventilación desactivada"
        break;
    else:
        print "Código incorrecto"
