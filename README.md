Instalado o Doker no Linux

Lita de comandos
* cd
* wget -O instalador.sh http://get.docker.com
* chmod a+x instalador.sh
* ./instalador.sh (aguarde a instalação)
* sudo apt-get install docker-compose
* sudo usermod -aG docker unidavi (unidavi aqui significa o login do computador nos computadores da unidavi, se for fazer no seu computador altere para o nome do seu usuário no linux)
* Reiniciar o Computador


--------------------------------------------------------------------------

Comando para iniciar o servidor

1 - Entre na pasta do projeto pelo terminar, ou no Visual Studio Code digite Ctrl+Shift+'
2 - Digite esse comando para iniciar o servidor: docker-compose up --build
3 - Após subir o servidor subir a URL: http://localhost:41065/
