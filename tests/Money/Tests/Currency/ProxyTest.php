<?php
namespace Money\Tests\Currency;

use PHPUnit_Framework_TestCase;
use Money\Currency\Proxy as CurrencyProxy;

/**
 * @package Money
 * @subpackage Currency
 */
class ProxyTest extends PHPUnit_Framework_TestCase
{
  public function testDetermine()
  {
    $this->assertEquals(new \Money\Currency\CurrencyUSD, CurrencyProxy::USD());
    $this->assertEquals(new \Money\Currency\CurrencyUSD, CurrencyProxy::determine('USD'));
  }

  public function testAlias()
  {
    $this->assertEquals(new \Money\Currency\CurrencyPound, CurrencyProxy::determine('gbp'));
    $this->assertEquals(new \Money\Currency\CurrencyAustralian, CurrencyProxy::determine('aud'));
    $this->assertEquals(new \Money\Currency\CurrencyUSD, CurrencyProxy::determine('Usd'));
  }
}
