<?php


namespace App\Parasut;


use GuzzleHttp\Client;

class Utils
{
    protected $client = null;

    /**
     * Convert json to array
     */
    public function toArray($json)
    {
        return json_decode((string)$json, true);
    }

    public function getClient()
    {
        if (isset($this->client)) {
            return $this->client;
        }
        $client = new Client();
        $this->client = $client;
        return $client;
    }

}
