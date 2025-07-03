# Twenty API

## Install

```sh
composer require tombroucke/twenty-api
```

### Usage

This library is based on [Fansipan](https://phanxipang.github.io/fansipan/).

There are a variety of convenient methods to inspect the response.

```php
$response->body(): string;
$response->data(): array;
$response->status(): int;
$response->ok(): bool;
$response->successful(): bool;
$response->failed(): bool;
$response->header(string $header): ?string;
$response->headers(): array;
// and more...
```

### Requests

There are currently 6 types of requests: `CreateManyObjectsRequest`, `CreateObjectRequest`, `DeleteObjectRequest`, `FindManyObjectsRequest`, `FindObjectRequest` and `UpdateObjectRequest`.

As a convention, the **first argument** of the constructor is always the **object's API Name**. 

In requests to endpoints for single objects, the **next argument** is the **object ID**. In POST requests (`CreateManyObjectsRequest`, `CreateObjectRequest`, `UpdateObjectRequest`), the **next argument** is the **post body**. The **next arguments** can be query parameters. For readability, you can use named arguments.

```php
new \Otomaties\Twenty\FindManyObjectsRequest(
    objectApiName: 'people',
    filter: 'companyId[eq]:12345678-ab12-12a3-12a3-a12b4c5678d9',
    startingAfter: 'eyJpZCI7GgHqLsjkE8A7RTblNGYaNDhhMy87ZqhePDOJB8VxZGFiZGIxMyJ7'
)
```

## Examples

### Find Many Objects

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

### Create Many Objects

```php
<?php

require dirname(__DIR__) . '/vendor/autoload.php';

$connector = new \Otomaties\Twenty\TwentyConnector(
    apiKey: 'xxx',
    baseUri: 'https://example.com'
);

$objects = [
    [
        'name' => [
            'firstName' => 'John',
            'lastName' => 'Doe',
        ],
    ],
    [
        'name' => [
            'firstName' => 'Jane',
            'lastName' => 'Doe',
        ],
    ],
];

$request = new \Otomaties\Twenty\CreateManyObjectsRequest('people', $objects);

$response = $connector->send($request);

var_dump(
    $response->data()
);
```

### Metadata

```php
<?php

require dirname(__DIR__) . '/vendor/autoload.php';

$connector = new \Otomaties\Twenty\TwentyConnector(
    apiKey: 'xxx',
    baseUri: 'https://example.com'
);

$request = new \Otomaties\Twenty\Metadata\ObjectsRequest();

$response = $connector->send($request);

var_dump(
    $response->data()
);
```
