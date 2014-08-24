<?php

namespace Money\Currency;

/**
 * @package Money
 * @subpackage Currency
 */
class CurrencyForint extends AbstractCurrency implements CurrencyInterface {
  public static function config() {
    return [
      'title' => 'Hungarian Forint',
			'symbol_left' => 'Ft',
			'symbol_right' => '',
			'code' => 'HUF',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
