<?php namespace Money\Currency;

class CurrencyKoruna extends AbstractCurrency implements CurrencyInterfae {
  public static function config() {
    return [
      'title' => 'Danish Krone',
			'symbol_left' => 'kr',
			'symbol_right' => '',
			'code' => 'DKK',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
