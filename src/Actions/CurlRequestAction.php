<?php

namespace Sfneal\GooglePlaces\Actions;

use Sfneal\Actions\Action;

class CurlRequestAction extends Action
{
    /**
     * @var string
     */
    private $endpoint;

    /**
     * CurlRequestAction constructor.
     *
     * @param string $endpoint
     */
    public function __construct(string $endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * Execute the cURL request and JSON decode the result.
     *
     * @return mixed
     */
    public function execute()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $this->endpoint);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }
}
