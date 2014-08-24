<?php

namespace Money\Currency;

/**
 * @package Money
 * @subpackage Currency
 
 */
class CurrencyFranc extends AbstractCurrency implements CurrencyInterface {
  public static function config() {
    return [
      'title' => 'Swiss Franc',
			'symbol_left' => 'CHF',
			'symbol_right' => '',
			'code' => 'CHF',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
