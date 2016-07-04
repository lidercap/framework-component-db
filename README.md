Component Db
============

Componente de conexão com o banco de dados da Liderança.

Instalação
----------

É recomendado instalar **component-db** através do [composer](http://getcomposer.org).

```
{
    "require": {
        "lidercap/framework-component-db": "dev-master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "git@bitbucket.org:lidercap/framework-component-db.git"
        }
    ]
}
```

NOME DA FUNÇÃO
--------------

Descrição da função.

```php
<?php

// Coloque aqui exemplos de uso

```

Desenvolvimento e Testes
------------------------

Dependências:

 * PHP 5.5.x ou superior
 * Composer
 * Git
 * Make

Para rodar a suite de testes, você deve instalar as dependências externas do projeto e então rodar o PHPUnit.

    $ make install
    $ make test    (sem relatório de coverage)
    $ make testdox (com relatório de coverage)

Responsáveis técnicos
---------------------

 * **André Sabino: <asabino@lidercap.com.br>**
 * **Fernando Villaça: <fvillaca@lidercap.com.br>**
 * **Leonardo Thibes: <lthibes@lidercap.com.br>**
