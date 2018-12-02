This library allows you to convert a number to words.

## Installation

Add package to your composer.json

```json
{
    "require": {
        "kilicoglutuncay/number-to-words": "dev"
    }
}
```

## Usage

```php
use NumberToWords\NumberToWords;

// create the number to words "manager" class
$numberToWords = new NumberToWords();

// build a new number converter
$converter = $numberToWords->getConverter('en');
```

Then it can be used passing in numeric values to the `convertToWords()` method:

```php
$converter->convertToWords(5120); // outputs "beş bin yüz yirmi"
```