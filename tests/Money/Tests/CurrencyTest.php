<?php
/**
 * This file is part of the Money library
 *
 * Copyright (c) 2011-2014 Mathias Verraes
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Money\Tests;

use PHPUnit_Framework_TestCase;
use Money\Currency\Proxy as CurrencyProxy;

/**
 * @package Money
 * @subpackage Currency
 */
class CurrencyTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
     $this->euro1 = CurrencyProxy::determine('EUR');
     $this->euro2 = CurrencyProxy::determine('EUR');
     $this->usd1 = CurrencyProxy::determine('USD');
     $this->usd2 = CurrencyProxy::determine('USD');
    }

    public function testDifferentInstancesAreEqual()
    {
     $this->assertTrue(
      $this->euro1->equals($this->euro2)
     );
     $this->assertTrue(
      $this->usd1->equals($this->usd2)
     );
    }

    public function testDifferentCurrenciesAreNotEqual()
    {
     $this->assertFalse(
      $this->euro1->equals($this->usd1)
     );
    }

  /**
   * @test
   * @expectedException \Money\Exception\UnknownCurrencyException
   */
  public function testCantInstantiateUnknownCurrency()
  {
    CurrencyProxy::determine('unknown');
  }
}
