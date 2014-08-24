<?php

namespace Money\Currency;

/**
 * @package Money
 * @subpackage Currency
 
 */
class CurrencySingapore extends AbstractCurrency implements CurrencyInterface {
  public static function config() {
    return [
      'title' => 'Singapore Dollar',
			'symbol_left' => '$',
			'symbol_right' => '',
			'code' => 'SGD',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
