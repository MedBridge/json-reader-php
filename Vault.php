<?php

namespace JsonReader;

class Reader
{
    private static $json_path = "/var/vault/secrets.json";
    private static $json;

    public static function setPath($path)
    {
        self::$json_path = $path;
        self::clearCache();
    }

    public static function clearCache()
    {
        self::$json = null;
    }

    public static function read($key)
    {
        if (!self::$json) {
            $tmp = file_get_contents(self::$json_path);

            if ($tmp === false) {
                throw new \Exception("Unable to load JSON file");
            }

            $decoded = json_decode($tmp);
            if (is_null($decoded) || !$decoded) {
                throw new \Exception("Unable to decode JSON file");
            }

            self::$json = $decoded;
        }

        if (!is_null(self::$json) && isset(self::$json->$key)) {
            return self::$json->$key;
        }
        throw new \Exception("Unable to retrieve JSON value: ${key}");
    }

}
