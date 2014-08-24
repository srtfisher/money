<?php

namespace Money\Currency;

/**
 * @package Money
 * @subpackage Currency
 
 */
class CurrencyHK extends AbstractCurrency implements CurrencyInterface {
  public static function config() {
    return [
      'title' => 'Hong Kong Dollar',
			'symbol_left' => '$',
			'symbol_right' => '',
			'code' => 'HKD',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
