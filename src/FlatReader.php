<?php

namespace JsonReader;

class FlatReader extends Reader
{
    public function __construct(string $jsonPath) 
    {
        parent::__construct($jsonPath);
    }

    public function read(string $key) : string
    {
        if (!is_null($this->json) && isset($this->json->$key)) {
            return $this->json->$key;
        }
        throw new JsonReaderException("Unable to retrieve JSON value: ${key}");
    }

}
