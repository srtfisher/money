<?php namespace Money\Currency;

class CurrencyKrone extends AbstractCurrency implements CurrencyInterfae {
  public static function config() {
    return [
      'title' => 'Norwegian Krone',
			'symbol_left' => 'kr',
			'symbol_right' => '',
			'code' => 'NOK',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
