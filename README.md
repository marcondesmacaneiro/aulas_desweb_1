Instalado o Doker no Linux

Antes de iniciar
criar uma pasta data dentro da pasta mysql e da pasta postgres


--------------------------------------------------------------------------
Lita de comandos
1. cd
2. wget -O instalador.sh http://get.docker.com
3. chmod a+x instalador.sh
4. ./instalador.sh (aguarde a instalação)
5. sudo apt-get install docker-compose
6. sudo usermod -aG docker unidavi (unidavi aqui significa o login do computador nos computadores da unidavi, se for fazer no seu computador altere para o nome do seu usuário no linux)
7. Reiniciar o Computador

--------------------------------------------------------------------------

Comando para iniciar o servidor

1. Entre na pasta do projeto pelo terminar, ou no Visual Studio Code digite Ctrl+Shift+'
2. Digite esse comando para iniciar o servidor: docker-compose up --build
3. Após subir o servidor subir a URL: http://localhost:41065/
