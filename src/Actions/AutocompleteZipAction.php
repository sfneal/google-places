<?php


namespace Sfneal\GooglePlaces\Actions;


use Sfneal\GooglePlaces\Actions\Abstracts\PlacesSearchAction;

class AutocompleteZipAction extends PlacesSearchAction
{
    /**
     * Parse the Google Places API response and return an array
     *
     * @param $response
     * @return array
     */
    public function parseResponse($response): array
    {
        // Parse predictions
        foreach ($response['predictions'] as $res) {
            $this->results[] = array_fill_keys(
                ['id', 'text'],
                (new ZipFromPlaceIdAction($this->query, $res['place_id']))->execute()
            );
        }

        return [
            'total_count' => count($this->results),
            'items' => $this->results,
        ];
    }
}
