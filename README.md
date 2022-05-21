# REQUISITOS DO PROJETO
- Composer
- Docker

# comandos para instalar as demendências do projeto
- docker compose up -d
- composer install

# para funcionar o projeto utilize os comandos na raiz do projeto :
- php Consumer.php
- php Producer.php

# para rodar o teste da classe responsável por trazer os dados da API:
- php vendor/bin/phpunit --colors test/IpStackTest.php
