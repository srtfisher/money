<?php

namespace Money\Currency;

/**
 * @package Money
 * @subpackage Currency
 */
class CurrencyBaht extends AbstractCurrency implements CurrencyInterface {
  public static function config() {
    return [
      'title' => 'Thai Baht',
			'symbol_left' => '฿',
			'symbol_right' => '',
			'code' => 'THB',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
