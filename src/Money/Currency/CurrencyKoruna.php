<?php namespace Money\Currency;

class CurrencyEuro extends AbstractCurrency implements CurrencyInterfae {
  public static function config() {
    return [
      'title' => 'Euro',
			'symbol_left' => '€',
			'symbol_right' => '',
			'code' => 'EUR',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
