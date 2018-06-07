<?php

namespace JsonReader;

class Reader
{
    private $jsonPath;
    private $json;

    public function __construct($jsonPath) 
    {
        $this->jsonPath = $jsonPath;
    }

    public function clearCache()
    {
        $this->json = null;
    }

    public function read($key)
    {
        if (!$this->json) {
            $tmp = file_get_contents($this->jsonPath);

            if ($tmp === false) {
                throw new \Exception("Unable to load JSON file");
            }

            $decoded = json_decode($tmp);
            if (is_null($decoded) || !$decoded) {
                throw new \Exception("Unable to decode JSON file");
            }

            $this->json = $decoded;
        }

        if (!is_null($this->json) && isset($this->json->$key)) {
            return $this->json->$key;
        }
        throw new \Exception("Unable to retrieve JSON value: ${key}");
    }

}
