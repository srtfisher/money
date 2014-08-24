<?php namespace Money\Currency;

class CurrencyNewZeland extends AbstractCurrency implements CurrencyInterfae {
  public static function config() {
    return [
      'title' => 'New Zealand Dollar',
			'symbol_left' => '$',
			'symbol_right' => '',
			'code' => 'NZD',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
