<?php

namespace Money\Currency;

/**
 * @package Money
 * @subpackage Currency
 
 */
class CurrencyYen extends AbstractCurrency implements CurrencyInterface {
  public static function config() {
    return [
      'title' => 'Japanese Yen',
			'symbol_left' => '¥',
			'symbol_right' => '',
			'code' => 'JPY',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
