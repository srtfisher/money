<?php namespace Money\Currency;

class CurrencySingapore extends AbstractCurrency implements CurrencyInterfae {
  public static function config() {
    return [
      'title' => 'Singapore Dollar',
			'symbol_left' => '$',
			'symbol_right' => '',
			'code' => 'SGD',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
