<?php 

namespace JsonReader;

class ReaderRegistry
{
    private static $readerRegistry = [];
    
    private static function getOrRegisterReader($readerName, $jsonPath) 
    {
      if (!isset(self::$readerRegistry[$readerName])) {
        self::$readerRegistry[$readerName] = new Reader($jsonPath);
      }
      return self::$readerRegistry[$readerName];
    }
}
