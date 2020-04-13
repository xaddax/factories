XADDAX Factories
================
Install
-------
```bash
composer require xaddax/factories
```
GatherConfigValues
------------------
This will look for values from both the Laminus config files and a .env file.
Usage
```php
    $values = (new GatherConfigValues)($container, 'group');
```
if in your .env file you have
```
GROUP_MY_VALUE=42
GROUP_IS_AWESOME=true
NOTGROUP_IS_AWESOME=false
```
and in your `*.global.php` you have
```php
return [
    'group' => [
        'isFun' = true,
        'options' => [
            'color' => 'purple',
            'size'  => 'large',
        ],
    ],
];
```
then $values would look like
```php
[
    'myValue'   => 42,
    'isAwesome' => true,
    'isFun'     => true,
    'options'   => [
        'color' => 'purple',
        'size'  => 'large',
    ],
]
```
MongoDB
-------
The configuration can happen through ENV variables, autoload configuration or a combination of the two, with ENV 
taking priority.

`config/autoload/mongodb.global.php`
```php

return [
    'mongodb' => [
        'uri' => 'mongodb://127.0.0.1/',
        'uriOptions' => [],
        'serverOptions' => [], // todo
    ],
];
``` 
uriOptions can be found [in the PHP documentation](http://php.net/mongodb-driver-manager.construct#mongodb-driver-manager.construct-urioptions)

environment variables
```
MONGODB_URI=mongodb://127.0.0.1/

```
