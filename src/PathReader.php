<?php

namespace JsonReader;

use \Flow\JSONPath\JsonPath;

class PathReader extends Reader
{

    /** @var JsonPath */
    private $flowJson;

    public function __construct(string $jsonPath) 
    {
        parent::__construct($jsonPath);
        $this->flowJson = new JsonPath($this->jsonPath);
    }

    public function read(string $key) : string
    {
        try {
            return $this->flowJson->find($key);
        } catch (\Exception $e) {
            throw new JsonReaderException($e);
        }
    }

}
