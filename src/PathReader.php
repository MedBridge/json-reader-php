<?php

use \Flow\JSONPath\JsonPath;

namespace JsonReader;

class PathReader extends Reader
{
    private $jsonPath;
    private $json;

    /** @var JsonPath */
    private $flowJson;

    public function __construct(string $jsonPath) 
    {
        parent::__construct($jsonPath);
        $this->flowJson = new JsonPath($this->jsonPath);
    }

    public function read(string $key)
    {
        try {
            return $this->flowJson->find($key);
        } catch (\Exception $e) {
            throw new ReaderException($e);
        }
    }

}
