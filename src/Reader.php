<?php

namespace JsonReader;

abstract class Reader
{

    /** @var array */
    protected $json;

    /** @var string */
    protected $jsonPath;

    public function __construct(string $jsonPath)
    {
        $tmp = file_get_contents($jsonPath);

        if ($tmp === false) {
            throw new JsonReaderException("Unable to load JSON file");
        }

        $decoded = json_decode($tmp);
        if (is_null($decoded) || !$decoded) {
            throw new JsonReaderException("Unable to decode JSON file");
        }

        $this->json = $decoded;
    }

    public abstract function read(string $key) : string;
}
