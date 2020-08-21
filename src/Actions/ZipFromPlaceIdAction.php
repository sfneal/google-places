<?php

namespace Sfneal\GooglePlaces\Actions;

use Sfneal\GooglePlaces\Actions\Abstracts\PlacesSearchAction;

class ZipFromPlaceIdAction extends PlacesSearchAction
{
    /**
     * Google Places details endpoint.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        // Retrieve a city's zip code by inputting it's place ID
        $query = $this->place_id ?? $this->query;

        $endpoint = 'https://maps.googleapis.com/maps/api/place/details/json?placeid='.$query;
        $endpoint .= '&language=en_EN';
        $endpoint .= '&region=us';
        $endpoint .= '&fields=address_component';
        $endpoint .= '&key='.env('GOOGLE_API_KEY');

        return $endpoint;
    }

    /**
     * Parse the Google Places API response and return an array.
     *
     * @param $response
     * @return string
     */
    public function parseResponse($response)
    {
        // Parse predictions
        foreach ($response['result']['address_components'] as $res) {
            if (in_array('postal_code', $res['types'])) {
                return $res['short_name'];
            }
        }
    }
}
