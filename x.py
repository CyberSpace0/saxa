import os
import random
import sys

cm = f'docker build {sys.argv[1]}'
x = os.popen(cm).read()
print(x)
r = len(x)
container = x[r-13:r-1]


T = True
a = open('ports','r')
while(T):
    port = random.randint(1,65000)
    if(str(port) in a.read()):
        False
    else:
        T = False
a = open('ports','a')
a.write(str(port)+'\n')
a.close()
cmd = f'docker run -p {port}:80 {container}'
os.popen(cmd)
print(port)
