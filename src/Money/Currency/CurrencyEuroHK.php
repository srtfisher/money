<?php namespace Money\Currency;

class CurrencyHK extends AbstractCurrency implements CurrencyInterfae {
  public static function config() {
    return [
      'title' => 'Hong Kong Dollar',
			'symbol_left' => '$',
			'symbol_right' => '',
			'code' => 'HKD',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
