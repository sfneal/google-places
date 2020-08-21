<?php

namespace Sfneal\GooglePlaces;

use Sfneal\GooglePlaces\Actions\Abstracts\PlacesSearchAction;

class AutocompleteCityAction extends PlacesSearchAction
{
    /**
     * Parse the Google Places API response and return an array.
     *
     * @param $response
     * @return array
     */
    public function parseResponse($response): array
    {
        // Parse predictions
        $i = 0;
        foreach ($response['predictions'] as $res) {
            $this->results[$i]['id'] = $res['description'];
            $this->results[$i]['text'] = $res['description'];
            $this->results[$i]['place_id'] = $res['place_id'];
            $i++;
        }

        return [
            'total_count' => count($this->results),
            'items' => $this->results,
        ];
    }
}
