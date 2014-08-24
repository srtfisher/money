<?php

namespace Money\Currency;

/**
 * @package Money
 * @subpackage Currency
 */
class CurrencyKoruna extends AbstractCurrency implements CurrencyInterface {
  public static function config() {
    return [
      'title' => 'Czech Koruna',
      'symbol_left' => '',
      'symbol_right' => 'Kč',
      'code' => 'CZK',
      'decimal_place' => 2,
      'decimal_point' => '.',
      'thousand_point' => ',',
    ];
  }
}
