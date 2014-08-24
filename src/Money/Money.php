<?php
/**
 * This file is part of the Money library
 *
 * Copyright (c) 2011-2014 Mathias Verraes
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Money;

use InvalidArgumentException;
use Money\Currency\CurrencyInterface;
use Money\Currency\Proxy as CurrencyProxy;

class Money
{
  const ROUND_HALF_UP = PHP_ROUND_HALF_UP;
  const ROUND_HALF_DOWN = PHP_ROUND_HALF_DOWN;
  const ROUND_HALF_EVEN = PHP_ROUND_HALF_EVEN;
  const ROUND_HALF_ODD = PHP_ROUND_HALF_ODD;

  /**
   * @var int
   */
  private $amount;

  /** @var CurrencyInterface */
  private $currency;

  /**
   * Create a Money instance
   * @param  integer $amount    Amount, expressed in the smallest units of $currency (eg cents)
   * @param  Currency $currency
   * @throws InvalidArgumentException
   */
  public function __construct($amount, CurrencyInterface $currency)
  {
    if (!is_int($amount)) {
   throw new InvalidArgumentException("The first parameter of Money must be an integer. It's the amount, expressed in the smallest units of currency (eg cents)");
    }

    $this->amount = $amount;
    $this->currency = $currency;
  }

  /**
   * Convenience factory method for a Money object
   * @example $fiveDollar = Money::USD(500);
   * @param string $method
   * @param array $arguments
   * @return Money
   */
  public static function __callStatic($method, $arguments)
  {
    $currency = CurrencyProxy::determine($method);

    return new Money($arguments[0], new $currency);
  }

  /**
   * @param Money $other
   * @return bool
   */
  public function isSameCurrency(Money $other)
  {
    return $this->currency->equals($other->currency);
  }

  /**
   * @throws InvalidArgumentException
   */
  private function assertSameCurrency(Money $other)
  {
    if (!$this->isSameCurrency($other)) {
   throw new InvalidArgumentException('Different currencies');
    }
  }

  /**
   * @param Money $other
   * @return bool
   */
  public function equals(Money $other)
  {
    return $this->isSameCurrency($other) && $this->amount == $other->amount;
  }

  /**
   * @param Money $other
   * @return int
   */
  public function compare(Money $other)
  {
    $this->assertSameCurrency($other);

    if ($this->amount < $other->amount) {
   return -1;
    } elseif ($this->amount == $other->amount) {
   return 0;
    } else {
   return 1;
    }
  }

  /**
   * @param Money $other
   * @return bool
   */
  public function greaterThan(Money $other)
  {
    return 1 == $this->compare($other);
  }

  /**
   * @param Money $other
   * @return bool
   */
  public function lessThan(Money $other)
  {
    return -1 == $this->compare($other);
  }

  /**
   * @deprecated Use getAmount() instead
   * @return int
   */
  public function getUnits()
  {
    return $this->amount;
  }

  /**
   * @return int
   */
  public function getAmount()
  {
    return $this->amount;
  }

  /**
   * @return Currency
   */
  public function getCurrency()
  {
    return $this->currency;
  }

  /**
   * @param Money $addend
   *@return Money
   */
  public function add(Money $addend)
  {
    $this->assertSameCurrency($addend);

    return new self($this->amount + $addend->amount, $this->currency);
  }

  /**
   * @param Money $subtrahend
   * @return Money
   */
  public function subtract(Money $subtrahend)
  {
    $this->assertSameCurrency($subtrahend);

    return new self($this->amount - $subtrahend->amount, $this->currency);
  }

  /**
   * @throws InvalidArgumentException
   */
  private function assertOperand($operand)
  {
    if (!is_int($operand) && !is_float($operand)) {
     throw new InvalidArgumentException('Operand should be an integer or a float');
    }
  }

  /**
   * @param $multiplier
   * @param int|\Money\RoundingMode $rounding_mode
   * @return Money
   */
  public function multiply($multiplier, $rounding_mode = self::ROUND_HALF_UP)
  {
    $this->assertOperand($multiplier);

    if (!$rounding_mode instanceof RoundingMode) {
   $rounding_mode = new RoundingMode($rounding_mode);
    }

    $product = (int) round($this->amount * $multiplier, 0, $rounding_mode->getRoundingMode());

    return new Money($product, $this->currency);
  }

  /**
   * @param $divisor
   * @param int|\Money\RoundingMode $rounding_mode
   * @return Money
   */
  public function divide($divisor, $rounding_mode = self::ROUND_HALF_UP)
  {
    $this->assertOperand($divisor);

    if (!$rounding_mode instanceof RoundingMode) {
   $rounding_mode = new RoundingMode($rounding_mode);
    }

    $quotient = (int) round($this->amount / $divisor, 0, $rounding_mode->getRoundingMode());

    return new Money($quotient, $this->currency);
  }

  /**
   * Allocate the money according to a list of ratio's
   * @param array $ratios List of ratio's
   * @return Money
   */
  public function allocate(array $ratios)
  {
    $remainder = $this->amount;
    $results = array();
    $total = array_sum($ratios);

    foreach ($ratios as $ratio) {
   $share = (int) floor($this->amount * $ratio / $total);
   $results[] = new Money($share, $this->currency);
   $remainder -= $share;
    }
    for ($i = 0; $remainder > 0; $i++) {
   $results[$i]->amount++;
   $remainder--;
    }

    return $results;
  }

  /** @return bool */
  public function isZero()
  {
    return $this->amount === 0;
  }

  /** @return bool */
  public function isPositive()
  {
    return $this->amount > 0;
  }

  /** @return bool */
  public function isNegative()
  {
    return $this->amount < 0;
  }

  /**
   * @param $string
   * @throws InvalidArgumentException
   * @return int
   */
  public static function stringToUnits($string)
  {
    //@todo extend the regular expression with grouping characters and eventually currencies
    if (!preg_match("/(-)?(\d+)([.,])?(\d)?(\d)?/", $string, $matches)) {
   throw new InvalidArgumentException("The value could not be parsed as money");
    }
    $units = $matches[1] == "-" ? "-" : "";
    $units .= $matches[2];
    $units .= isset($matches[4]) ? $matches[4] : "0";
    $units .= isset($matches[5]) ? $matches[5] : "0";

    return (int) $units;
  }
}
