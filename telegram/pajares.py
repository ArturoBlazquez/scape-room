# -*- coding: utf-8 -*-
import sys
import time
import telepot
import telepot.namedtuple
from telepot.loop import MessageLoop

from datetime import datetime
import codecs
import os


def log(msg):
    with codecs.open(os.path.join(os.path.dirname(__file__), 'log.log'), "a", "utf-8") as f:
        f.write(msg+'\n')


password="fortasec"
counter=0

def handle(msg):
    content_type, chat_type, chat_id = telepot.glance(msg)
    global counter
    
    if chat_id < 0:
        # group message
        log('Received a %s from %s, by %s' % (content_type, m.chat, m.from_))
    else:
        # private message
        log("Received %s from %s at %s" %(msg['text'], msg['from']['username'], datetime.fromtimestamp(msg['date']).strftime("%Y-%m-%d %H:%M:%S")))

    if content_type == 'text':
        reply = ''
        
        command = msg['text'].strip().lower()
        
        if msg['text'] == "/start":
            reply='Para saber a quien llamar primero decidme la contraseña'
        
        elif msg['text']!=password and counter<4:
            counter=counter+1
            reply="❌\nLleváis %d intentos de 5" %(counter)
        elif msg['text']!=password:
            reply="Os toca joderos por poner códigos al azar 🙃"
        if msg['text']==password:
            counter=0
            reply="😀\nHablad con Tomas Gil"
        
        bot.sendMessage(chat_id, reply)


TOKEN = sys.argv[1]  # get token from command-line

bot = telepot.Bot(TOKEN)
MessageLoop(bot, handle).run_as_thread()
log('Listening ...')

# Keep the program running.
while 1:
    time.sleep(1)
