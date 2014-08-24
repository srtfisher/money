<?php namespace Money\Currency;

class CurrencyForint extends AbstractCurrency implements CurrencyInterfae {
  public static function config() {
    return [
      'title' => 'Hungarian Forint',
			'symbol_left' => 'Ft',
			'symbol_right' => '',
			'code' => 'HUF',
			'decimal_place' => 2,
			'decimal_point' => '.',
			'thousand_point' => ',',
    ];
  }
}
