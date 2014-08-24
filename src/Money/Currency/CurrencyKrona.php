<?php namespace Money\Currency;

class CurrencyKrona extends AbstractCurrency implements CurrencyInterfae {
  public static function config() {
    return [
      'title' => 'Swedish Krona',
			'symbol_left' => 'kr',
			'symbol_right' => '',
			'code' => 'SEK',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
