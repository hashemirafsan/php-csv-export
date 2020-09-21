# PHP CSV Export
A simple & lightweight csv export package for PHP

## Installation
You can start it from composer. Go to your terminal and run this command from your project root directory.

```php
composer require hashemi/php-csv-export
```
## Usage
After Complete installation, It's time to check how to use.

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Hashemi\CsvExport\CsvExport;

$headers = [
    'id',
    'name',
    'age'
];

$rows = [
    [1, 'Foo', 12],
    [2, 'Bar', 34],
    [3, 'John', 12]
];

(new CsvExport())
    ->setHeaders($headers)
    ->setRows($rows)
    ->setFileName('employee.csv')
    ->download();

// or

(new CsvExport($headers, $rows, 'employee.csv'))->download();

```

## Contributing
Pull requests are welcome. For any changes, please open an issue first to discuss what you would like to change.