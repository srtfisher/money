<?php

namespace Money\Currency;

/**
 * @package Money
 * @subpackage Currency
 */
class CurrencySheqel extends AbstractCurrency implements CurrencyInterface {
  public static function config() {
    return [
      'title' => 'Israeli New Sheqel',
			'symbol_left' => '?',
			'symbol_right' => '',
			'code' => 'ILS',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
