<?php namespace Money\Currency;

class CurrencyEuro extends AbstractCurrency implements CurrencyInterfae {
  public static function config() {
    return [
      'title' => 'Pound Sterling',
			'symbol_left' => '£',
			'symbol_right' => '',
			'code' => 'GBP',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
