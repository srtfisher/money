<?php namespace Money\Currency;

class CurrencyAustrialian extends AbstractCurrency implements CurrencyInterfae {
  public static function config() {
    return [
      'title' => 'Australian Dollar',
			'symbol_left' => '$',
			'symbol_right' => '',
			'code' => 'AUD',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
			'status' => 1,
    ];
  }
}
