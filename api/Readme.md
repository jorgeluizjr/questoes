# API

## Como utilizar

### Criar um novo módulo

 ```console
php artisan make:module Foo
 ```
 
### Descobrir novos módulos

```console
php artisan package:discover --ansi
```

### Popular Seeds nos módulos

Para popular seeds nos módulos execute o comando abaixo. O próximo parâmetro após a expressão `module:seed` será
o **slug** do módulo desejado.
```console
php artisan module:seed foo
```

**OBS** A localização dos slugs dos módulos está no arquivo `module.json` na raiz do módulo.
 
### Atualizar mapeamento de classes

 ```console
 composer dumpautoload
 ```
 
## Referencias

- [Laravel Modules](https://caffeinatedpackages.com/guide/packages/modules.html#installationn)
- [Laravel website](https://laravel.com)
