# Twenty API

## Install

```sh
composer require tombroucke/twenty-api
```

## Example

```php
<?php

require dirname(__DIR__) . '/vendor/autoload.php';

$connector = new \Otomaties\Twenty\TwentyConnector(
    apiKey: 'xxx',
    baseUri: 'https://example.com'
);

$request = new \Otomaties\Twenty\FindManyObjectsRequest('people');

$response = $connector->send($request);

var_dump(
    $response->data()
);
```
