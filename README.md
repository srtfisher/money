Money
=====

[![Build Status](https://api.travis-ci.org/srtfisher/money.png?branch=master)](http://travis-ci.org/srtfisher/money)

PHP 5.4+ library to make working with money safer, easier, and fun!

> "If I had a dime for every time I've seen someone use FLOAT to store currency, I'd have $999.997634" -- [Bill Karwin](https://twitter.com/billkarwin/status/347561901460447232)

In short: You shouldn't represent monetary values by a float. Wherever
you need to represent money, use this Money value object.

```php
<?php

use Money\Money;

$fiveEur = Money::Euro(500);
$tenEur = $fiveEur->add($fiveEur);

list($part1, $part2, $part3) = $tenEur->allocate(array(1, 1, 1));
assert($part1->equals(Money::Euro(334)));
assert($part2->equals(Money::Euro(333)));
assert($part3->equals(Money::Euro(333)));

// Format
// $1,234.56
echo Money::USD(123456)->format();
```

The documentation is available at http://money.readthedocs.org

Money Format
------------

When creating a money object, it is expected to be in the lowest value of the
currency (e.g. cents). For example, `$1,234.56` is actually `123,456` cents.

For conversion from cents to dollars:

```php
<?php
$dollars = $cents * 100;
```

For conversion from dollars to cents:

```php
<?php
$cents = $dollars / 100;
```

Installation
------------

Install the library using [composer][1]. Add the following to your `composer.json`:

```json
{
    "require": {
      "srtfisher/money": "dev-master"
    },
    "minimum-stability": "dev"
}
```

Now run the `install` command.

```sh
$ composer.phar install
```

Integration
-----------

See [`MoneyBundle`][2] or [`TbbcMoneyBundle`][4] for [Symfony integration][3].

[1]: http://getcomposer.org/
[2]: https://github.com/pink-tie/MoneyBundle/
[3]: http://symfony.com/
[4]: https://github.com/TheBigBrainsCompany/TbbcMoneyBundle
