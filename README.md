XADDAX Factories
================

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
