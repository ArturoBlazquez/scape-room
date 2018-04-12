from numpy import random
from random import randint

with open('nombres.txt') as f:
    nombres=[x.strip() for x in f.readlines()]

with open('apellidos.txt') as f:
    apellidos=[x.strip() for x in f.readlines()]

buffer=""

for i in range(500):
    nombre=random.choice(nombres)
    apellido=random.choice(apellidos)
    buffer+="BEGIN:VCARD\nVERSION:3.0\n"
    buffer+="N:%s;%s;;;\n" %(apellido,nombre)
    buffer+="FN:%s %s\n" %(nombre,apellido)
    buffer+="TEL;type=WORK:%d\nEND:VCARD\n" %(randint(100,999))

with open('contactos.vcf','w') as f:
    f.write(buffer)
