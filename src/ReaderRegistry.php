<?php 

namespace JsonReader;

class ReaderRegistry
{
    private static $readerRegistry = [];

    public static function getOrRegisterFlatReader(string $readerName, string $jsonPath) : Reader
    {
      if (!isset(self::$readerRegistry[$readerName])) {
        self::$readerRegistry[$readerName] = new FlatReader($jsonPath);
      }
      return self::$readerRegistry[$readerName];
    }

    public static function getOrRegisterPathReader(string $readerName, string $jsonPath) : Reader
    {
        if (!isset(self::$readerRegistry[$readerName])) {
            self::$readerRegistry[$readerName] = new PathReader($jsonPath);
        }
        return self::$readerRegistry[$readerName];
    }
}