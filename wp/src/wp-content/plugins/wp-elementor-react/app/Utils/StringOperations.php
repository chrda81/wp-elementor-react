<?php

declare(strict_types=1);

namespace WpElementorReact\Utils;

class StringOperations
{
  private static array $dynamicElements = [];
  public static function addDynamicElement($elem)
  {
    // add to existing array
    array_push(self::$dynamicElements, $elem);
    return self::$dynamicElements;
  }

  public static function getDynamicElements()
  {
    return self::$dynamicElements;
  }

  public static function isEmail($email)
  {
    if (
      preg_match(
        '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i',
        $email
      )
    ) {
      return true;
    } else {
      return false;
    }
  }

  public static function randomString($length)
  {
    return substr(base_convert(sha1(uniqid((string) mt_rand())), 16, 36), 0, $length);
  }
}
