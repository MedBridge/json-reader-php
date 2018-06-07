# json-reader-php

Used to read key/value pairs from a flat JSON file. 

# Installation

Update composer.json to include the following and then run `composer update`

```json
{
  "require": {
    "medbridge/json-reader-php": "master@dev"
  },
  "repositories": [{
    "type": "vcs",
    "url": "git@github.com:MedBridge/json-reader-php.git"
  }]
}
```

# Example Implementation

```php
class Vault
{

    const secretPath = "/var/vault/secrets.json";
    const readerName = "vault";

    public static function read($secret)
    {
        /** @var JsonReader\Reader $reader */
        $reader = JsonReader\ReaderRegistry::getOrRegisterReader(self::readerName, self::secretPath);
        return $reader->read($secret);
    }

}
```
