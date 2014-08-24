<?php

namespace Money\Currency;

/**
 * @package Money
 * @subpackage Currency
 
 */
class CurrencyMexicanPeso extends AbstractCurrency implements CurrencyInterface {
  public static function config() {
    return [
      'title' => 'Mexican Peso',
			'symbol_left' => '$',
			'symbol_right' => '',
			'code' => 'MXN',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
