# Prova Desenvolvedor Full Stack PHP

O desenvolvimento da prova consiste em desenvolver o sistema conforme especificado, em protótipos enviados por e-mail.

O projeto da prova utiliza a linguagem PHP.

Alguns pontos em relação ao desenvolvimento: 
- Fique a vontade para utilizar ou não os frameworks que achar melhor, tanto para back-end (Laravel/Symfony) como para front-end (Vue/React/Livewire).
- A criação das tabelas no banco de dados, são de forma automática, conforme modelagem do projeto, mas fique a vontade para alterar caso ache necessário.
- Organize os arquivos do projeto de uma forma adequada (MVC).
- Descreva ao final deste documento (Readme.md) o detalhamento de funcionalidades implementadas, sejam elas já descritas na modelagem e/ou extras.
- Detalhar como configurar e subir as aplicações caso resolva mudar alguma coisa.
- Detalhar também as funcionalidades que não conseguiu implementar e o motivo.
- Descreva quais tecnologias foram utilizadas e porque da sua escolha.
- As alterações realizadas na prova deve ser comitada diretamente na master/main do repositório, e não deve estar zipado.
- Caso ocorrer algum problema ao utilizar o banco no docker, pode-se utilizar sem o docker.

## Configuração

A realização da prova consiste na criação de duas aplicações, uma API e uma WEB. 
Na pasta raiz desse resposítório encontra-se duas pastas, API e WEB, e dentro de cada uma delas contém a pasta *src*, onde deve ficar o código fonte de cada aplicação.
Cada pasta contém um arquivo *docker-compose.yaml*, onde deve ser iniciado via docker, utilizando o cmd/terminal, com o comando:

`docker-compose up -d`

Verificar possíveis conflitos de portas, caso já haja alguma instancia usando as portas 80, 81, 5432 e 5433 do *localhost*.

Para parar os servidores, utilizar o comando:

`docker-compose down`

## Dados de conexão Banco de Dados

### Banco de Dados API:

- **host**: localhost (ou 127.0.0.1)
- **port**: 5433
- **database**: ist-api
- **user**: ist
- **pass**: ist

### Banco de Dados WEB:

- **host**: localhost (ou 127.0.0.1)
- **port**: 5432
- **database**: ist-web
- **user**: ist
- **pass**: ist

## Docker

Note que para a inicialização das aplicações e os bancos de dados, o *Docker* deve estar instalado no computador.

Verificar as instruções de instalação no próprio site do *Docker* em https://docs.docker.com/get-docker/
