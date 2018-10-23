# Exchange1c-symfony-bridge
![Packagist](https://img.shields.io/packagist/l/bigperson/exchange1c.svg?style=flat-square)
[![Packagist](https://img.shields.io/packagist/dt/bigperson/exchange1c-symfony-bridge.svg?style=flat-square)](https://packagist.org/packages/bigperson/exchange1c-symfony-bridge)
[![Packagist](https://img.shields.io/packagist/v/bigperson/exchange1c-symfony-bridge.svg?style=flat-square)](https://packagist.org/packages/bigperson/exchange1c-symfony-bridge)
[![Travis (.org)](https://img.shields.io/travis/bigperson/exchange1c-symfony-bridge.svg?style=flat-square)](https://travis-ci.org/bigperson/exchange1c-symfony-bridge)
[![Codecov](https://img.shields.io/codecov/c/github/bigperson/exchange1c-symfony-bridge.svg?style=flat-square)](https://codecov.io/gh/bigperson/exchange1c-symfony-bridge)
[![StyleCI](https://github.styleci.io/repos/154305376/shield?branch=master)](https://github.styleci.io/repos/154305376)

Простой адаптер для использования пакета symfony/event-dispatcher вместе с пакетом https://github.com/bigperson/exchange1c

## Установка
```
composer require bigperson/exchange1c-symfony-bridge
```

# Использование
Просто создайте экземпляр `Bigperson\Exchange1CSymfonyBridge\SymfonyEventDispatcher` и передайте ему в конструктор экземпляр класса `Symfony\Component\EventDispatcher\EventDispatcherInterface`. Далее используйте получившийся экземпляр адаптера в сервисах.
```php
use Bigperson\Exchange1C\Interfaces\EventInterface;
use Bigperson\Exchange1CSymfonyBridge\SymfonyEventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcher;

$symfonyDispatcher = new EventDispatcher();
$bridgeDispatcher = new SymfonyEventDispatcher($symfonyDispatcher);
...

$categoryService = new \Bigperson\Exchange1C\Services\CategoryService($request, $config, $bridgeDispatcher, $modelBuilder);
```
 
