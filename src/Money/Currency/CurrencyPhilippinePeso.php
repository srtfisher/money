<?php

namespace Money\Currency;

/**
 * @package Money
 * @subpackage Currency
 */
class CurrencyPhilippinePeso extends AbstractCurrency implements CurrencyInterface {
  public static function config() {
    return [
      'title' => 'Philippine Peso',
			'symbol_left' => 'Php',
			'symbol_right' => '',
			'code' => 'PHP',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
