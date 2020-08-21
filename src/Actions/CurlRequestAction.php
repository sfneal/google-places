<?php


namespace Sfneal\GooglePlaces\Actions;


use Sfneal\Actions\AbstractActionStatic;

class CurlRequestAction extends AbstractActionStatic
{
    /**
     * Execute the cURL request and JSON decode the result
     *
     * @param string $endpoint
     * @return mixed
     */
    public static function execute(string $endpoint) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }
}
