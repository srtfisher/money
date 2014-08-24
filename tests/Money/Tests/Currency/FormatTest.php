<?php
namespace Money\Tests\Currency;

use PHPUnit_Framework_TestCase;
use Money\Money;

/**
 * @package Money
 * @subpackage Currency
 */
class FormatTest extends PHPUnit_Framework_TestCase
{
  public function setUp()
  {
    $this->money_usd = Money::USD(1234);
    $this->money_euro = Money::Euro(1234);
    $this->money_czech = Money::Koruna(1234);
  }

  public function testFormat()
  {
    // USD
    $this->assertEquals($this->money_usd->format(), '$12.34');

    // Euro
    $this->assertEquals($this->money_euro->format(), '€12.34');

    // To String
    $this->assertEquals((string) $this->money_usd, '$12.34');
  }

  public function testFormatStringRight()
  {
    $this->assertEquals($this->money_czech->format(), '12.34Kč');
  }
}
