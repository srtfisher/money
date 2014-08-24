<?php

namespace Money\Currency;

/**
 * @package Money
 * @subpackage Currency
 */
class CurrencyZloty extends AbstractCurrency implements CurrencyInterface {
  public static function config() {
    return [
      'title' => 'Polish Zloty',
			'symbol_left' => '',
			'symbol_right' => 'zł',
			'code' => 'PLN',
			'decimal_place' => 2,
			'value' => 3.08590007,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
