<?php 

namespace JsonReader;

class ReaderRegistry
{
    private static $readerRegistry = [];

    public static function getOrRegisterReader($readerName, $jsonPath) 
    {
      if (!isset(self::$readerRegistry[$readerName])) {
        self::$readerRegistry[$readerName] = new Reader($jsonPath);
      }
      return self::$readerRegistry[$readerName];
    }
}
