# -*- coding: utf-8 -*-
from hashlib import sha256

print("\n"*40+chr(27) + "[2J") #Pantalla nueva

while 1:
    code = raw_input('Introduzca el código para desactivar la ventilación: ')
    print(chr(27) + "[2J") #Pantalla nueva
        
    if(sha256(code).hexdigest()=='b221d9dbb083a7f33428d7c2a3c3198ae925614d70210e28716ccaa7cd4ddb79'):
        print "Ventilación desactivada"
        break;
    else:
        print "Código incorrecto"
