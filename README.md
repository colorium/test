# Colorium text helpers

## Lang Helper

```php
$langs = [
    'en' => [
        'demo.hello' => 'Hello !',
        'demo.pears' => 'Can you buy {number} pears, please ?'
    ]
];

use Colorium\Text\Lang;

Lang::load($langs, 'en');

echo Lang::get('demo.hello'); // Hello !
echo Lang::get('demo.pears', ['number' => 18]); // Can you buy 18 pears, please ?
```

## Install

`composer require colorium/text`