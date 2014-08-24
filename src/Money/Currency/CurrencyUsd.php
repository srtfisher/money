<?php

namespace Money\Currency;

/**
 * @package Money
 * @subpackage Currency
 */
class CurrencyUSD extends AbstractCurrency implements CurrencyInterface {
  public static function config() {
    return [
      'title' => 'U.S. Dollar',
			'symbol_left' => '$',
			'symbol_right' => '',
			'code' => 'USD',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
