<?php

namespace JsonReader;

class FlatReader extends Reader
{
    private $jsonPath;
    private $json;

    public function __construct(string $jsonPath) 
    {
        $this->jsonPath = $jsonPath;
    }

    public function read(string $key) : string
    {
        if (!is_null($this->json) && isset($this->json->$key)) {
            return $this->json->$key;
        }
        throw new ReaderException("Unable to retrieve JSON value: ${key}");
    }

}
