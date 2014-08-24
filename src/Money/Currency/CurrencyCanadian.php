<?php

namespace Money\Currency;

/**
 * @package Money
 * @subpackage Currency
 */
class CurrencyCanadian extends AbstractCurrency implements CurrencyInterface {
  public static function config() {
    return [
      'title' => 'Canadian Dollar',
			'symbol_left' => '$',
			'symbol_right' => '',
			'code' => 'CAD',
			'decimal_place' => 2,
			'value' => 0.98500001,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
