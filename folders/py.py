# -*- coding: utf-8 -*-
import os
from numpy import random

with open('listado-general.txt') as f:
    words=[x.strip() for x in f.readlines()]

def makedir(depth,path):
    if depth==0:
        with open(path+"codigo.txt", "w") as f:
            f.write(random.choice(words))
        return
    os.makedirs(path+"←")
    makedir(depth-1,path+"←/")
    os.makedirs(path+"↑")
    makedir(depth-1,path+"↑/")
    os.makedirs(path+"→")
    makedir(depth-1,path+"→/")
    os.makedirs(path+"↓")
    makedir(depth-1,path+"↓/")
    
    
makedir(8,"")
