<?php namespace Money\Currency;

class CurrencyUsd extends AbstractCurrency implements CurrencyInterfae {
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
