<?php

namespace Money\Currency;

/**
 * Abstract Currency Object
 * Shared format function to format a money object to a specific currency
 *
 * @package money
 */
abstract class AbstractCurrency {
  /**
   * @return string
   */
  public function getName()
  {
   return $this->config()['title'];
  }

  /**
   * @param Currency $other
   * @return bool
   */
  public function equals(Currency $other)
  {
   return $this->getName() === $other->getName();
  }

  /**
   * @return string
   */
  public function __toString()
  {
   return $this->getName();
  }

  /**
   * Format a Price into Currency String
   *
   * @param  {[type]} $number    [description]
   * @param  {[type]} $symbol_style =       '%symbol%' [description]
   * @param  {[type]} $inverse   =       false   [description]
   * @param  {[type]} $use_space    =       false   [description]
   * @return {[type]}      [description]
   */
  public function format($number, $symbol_style = '%symbol%', $inverse = false, $use_space = false)
  {
    $config = self::config();

		$symbol_left    = $config['symbol_left'];
		$symbol_right   = $config['symbol_right'];
		$decimal_place  = $config['decimal_place'];
		$decimal_point  = $config['decimal_point'];
		$thousand_point = $config['thousand_point'];

    if ($value = $this->config['value']) {
   if ( $inverse ) {
     $value = $number * (1 / $value);
   } else {
     $value = $number * $value;
   }
    } else {
   $value = $number;
    }

    $string = '';

		if ($symbol_left) {
   $string .= str_replace('%symbol%', $symbol_left, $symbol_style);

   if ($use_space) $string .= ' ';
    }

		$string .= number_format(round($value, (int)$decimal_place), (int)$decimal_place, $decimal_point, $thousand_point);

  	if ( $symbol_right ) {
	    if ($use_space) $string .= ' ';

	    $string .= str_replace('%symbol%', $symbol_right, $symbol_style);
  	}

    return $string;
  }
}
