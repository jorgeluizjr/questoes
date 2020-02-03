# Sistemas de Questões de Concurso

# Questões
Sistemas de questões de concursos

## Tecnologias

Repositório com responsabilidade de disponibilizar uma stack com serviços que permitam trabalhar com o projeto.

## Tecnologias utilizadas

- Docker
- PHP 7.3 (php-fpm)
  - Laravel Framework
  - Eloquent ORM
  - PSR : 2, 3, 4, 7, 11, 14, 15, 17, 18
- Nginx
- Javascript
  - Node
  - VueJS + VueX + Vuetify
  - MySQL

## Como inicializar a Stack

O comando abaixo servirá para a criação das imagens utilizadas nos serviços referentes a API(php-fpm),
WebServer(NGINX) e WebApp(NodeJS).

```console
cp exemplo-docker-compose.yml docker-compose.yml
```
```console
docker-compose up
```

## Estrutura de pastas

O projeto foi divido em 3 estruturas de pastas principais:

- [api back-end](./api)
- [webapp front-end](./webapp)
- [database](./database) - Repositório criado dinamicamente 

## Serviços Disponíveis

Para reunir todos os módulos acima, foi criada uma stack Docker da aplicação, contendo os serviços abaixo:

- webapp-service - Porta 8080
- api-service - Porta 9000
- webserver-service - Porta 88
- database-service - Porta 3307

#### Publicando Frontend

Para disponibilizar o frontend da aplicação, execute o passos a seguir:
- Dentro do diretório `webapp`  executar o comando `npm run install` para instalar as dependências e o `npm run build` para preparar para produção. 
- O diretório `dist` será criado contendo o código-fonte da camada de apresentação de forma reduzida.

## Funcionalidades 
  
- [x] Manter Programa
