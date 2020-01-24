# API

## Sobre

A API da aplicação disponibiliza rotas que são documentadas e geradas à partir do SWAGGER.

Os end-points disponíveis podem ser acessados à partir da rota abaixo
```http request
{server-api}:{api-port}/api/documentation
```

## Como utilizar

### Criar um novo módulo

 ```console
php artisan make:module Conta
 ```
 
 **OBS** Também é possível duplicar o diretório `Foo` que está localizado dentro de `Modules`.
 
### Descobrir novos módulos

```console
php artisan package:discover --ansi
```

### Popular Seeds nos módulos

Para popular seeds nos módulos execute o comando abaixo. O próximo parâmetro após a expressão `module:seed` será
o **slug** do módulo desejado.
```console
php artisan module:seed conta
```

**OBS** A localização dos slugs dos módulos está no arquivo `module.json` na raiz do módulo.
 
### Atualizar documentação gerada pelo Swagger

 ```console
php artisan l5-swagger:generate
 ```
 
### Atualizar mapeamento de classes

 ```console
 composer dumpautoload
 ```
 
### Telescope

O Telescope é um assistente de depuração para verificar requests com parâmetros, melhor visualização de logs, caches, queries, exceptions e etc.


Para utilizar:

Alterar a variável de ambiente

```$xslt
TELESCOPE_ENABLED=true
```

```$xslt
php artisan telescope:install
```

```$xslt
php artisan telescope:publish
```

```$xslt
php artisan migrate ou php artisan migrate --path=database
```

Para acessar basta acessar o path `http://localhost:<PORTA>/telescope` ou o path definido na variável de ambiente `TELESCOPE_PATH`.
 
## Referencias

- [Laravel Modules](https://caffeinatedpackages.com/guide/packages/modules.html#installationn)
- [Laravel website](https://laravel.com)
