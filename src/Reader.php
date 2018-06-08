<?php

namespace JsonReader;

abstract class Reader
{

  private $json;
  private $jsonPath;

  public function __construct(string $jsonPath)
  {
    if (!$this->json) {
      $tmp = file_get_contents($this->jsonPath);

      if ($tmp === false) {
          throw new ReaderException("Unable to load JSON file");
      }

      $decoded = json_decode($tmp);
      if (is_null($decoded) || !$decoded) {
          throw new ReaderException("Unable to decode JSON file");
      }

      $this->json = $decoded;
    }

  }

  public abstract function read($key);
}
