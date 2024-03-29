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
            "url":  "git@github.com:lidercap/framework-component-db.git"
        }
    ]
}
```

Conectando com o banco de dados
-------------------------------

##### 1) Passando parâmetros de conexão pelo construtor

```php
<?php

$connector = new \Lidercap\Component\Db\DbConnector([
    'hostname' => $hostname,
    'database' => $database,
    'username' => $username,
    'password' => $password,
]);

$conection = $conector->getConnection();

```

##### 2) Passando parâmetros de conexão como array

```php
<?php

$connector = new \Lidercap\Component\Db\DbConnector();
$connector->setConfig([
    'hostname' => $hostname,
    'database' => $database,
    'username' => $username,
    'password' => $password,
]);

$conection = $conector->getConnection();

```

##### 3) Passando parâmetros individualmente

```php
<?php

$connector = new \Lidercap\Component\Db\DbConnector();
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

 * **Leonardo Thibes: <lthibes@lidercap.com.br>**
 * **Gabriel Specian: <gspecian@lidercap.com.br>**
