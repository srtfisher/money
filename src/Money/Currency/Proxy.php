<?php
namespace Money\Currency;

use Money\Exception\UnknownCurrencyException;

/**
 * Currency Proxy
 * Determine a Currency object from string
 *
 * @package Money
 * @subpackage Currency
 */
class Proxy {
  /**
   * Determine a Currency Object
   *
   * @param  string
   * @return Money\Currency\CurrencyInterface
   */
  public static function determine($currency)
  {
    $namespace = 'Money\\Currency\\';

    $object = self::determineFromString($currency);
    if ($object) return $object;

    $aliases = self::aliases();

    foreach ($aliases as $c => $a) {
      // Found an alias
      if (in_array(strtolower($currency), $a))
        return self::determineFromString($c);
    }

    // Unable to determine
    throw new UnknownCurrencyException(sprintf('Unknown curency to determine: %s', $currency));
  }

  /**
   * @return array
   */
  public static function aliases()
  {
    return [
      'Euro'          => ['eur',],
      'USD'           => ['us', 'us dollar'],
      'Australian'    => ['aud'],
      'Pound'         => ['gbp'],
      'Yen'           => ['jpy',]
    ];
  }

  /**
   * Find class from string
   *
   * @return void|Money\Currency\CurrencyInterface
   */
  protected static function determineFromString($name)
  {
    $namespace = 'Money\\Currency\\Currency';
    $class = $namespace . $name;

    return (class_exists($class)) ? new $class : null;
  }

  /**
   * Call static proxy
   */
  public static function __callStatic($name, $arguments)
  {
    return self::determine($name);
  }
}
