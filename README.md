#Alea

A tiny library to select a random element from a weighted list.

## Installation

### With composer

If you use [composer](http://getcomposer.org/), you just need to add `lortabac/alea` to your `composer.json` file.

```
{
    "require": {
        "lortabac/alea": "dev-master"
    }
}
```

### Manual installation

1. Copy the files in the `src` directory into your project.

2. Include the class you need (`WeightedList.php` or `Dice.php`).

## Usage

### Weighted list

In weighted list mode, a relative weight is assigned to each element.

``` PHP
$criteria = [
	['foo', 50],
	['bar', 30],
	['baz', 20]
];

$weightedList = new Alea\WeightedList($criteria);
$element = $weightedList->getItem();
```

### Dice

In dice mode, each element has a specific range. Only the upper limit is specified. The first range always starts from 1.

``` PHP
$criteria = [
    ['foo', 6], // from 1 to 6
    ['bar', 8], // 7 and 8
    ['baz', 12] // from 9 to 12
];

$dice = new Alea\Dice($criteria);
$element = $dice->getItem();
```

You can optionally include the dice roll. In this case the result is given as an associative array.

``` PHP
$itemData = $dice->getItem(Alea\Dice::INCLUDE_ROLL);
print_r($itemData);

/*
Array
(
    [roll] => 8
    [item] => bar
)
*/
```

## License

(The MIT License)

Copyright (C) 2013 Lorenzo Tabacchini

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
