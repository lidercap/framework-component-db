Component Db
============

Componente de conexão com o banco de dados da Liderança.

Instalação
----------

É recomendado instalar **component-db** através do [composer](http://getcomposer.org).

```json
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

Lista de funções
----------------

##### 1) Passando parâmetros de conexão pelo construtor.

```php
<?php

$connector = new DbConnector([
    'hostname' => $hostname,
    'database' => $database,
    'username' => $username,
    'password' => $password,
]);

$conection = $conector->getConnection();

```

##### 2) Passando parâmetros de conexão como array.

```php
<?php

$connector = new DbConnector();
$connector->setConfig([
    'hostname' => $hostname,
    'database' => $database,
    'username' => $username,
    'password' => $password,
]);

$conection = $conector->getConnection();

```

##### 3) Passando parâmetros individualmente.

```php
<?php

$connector = new DbConnector();
$connector->setHostname($hostname);
$connector->setDatabase($database);
$connector->setUsername($username);
$connector->setPassword($password);

$conection = $conector->getConnection();

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
