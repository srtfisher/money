<?php

namespace Money\Currency;

/**
 * @package Money
 * @subpackage Currency
 */
class CurrencyTaiwan extends AbstractCurrency implements CurrencyInterface {
  public static function config() {
    return [
      'title' => 'Taiwan New Dollar',
			'symbol_left' => 'NT$',
			'symbol_right' => '',
			'code' => 'TWD',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
