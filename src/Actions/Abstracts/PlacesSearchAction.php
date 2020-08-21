<?php


namespace Sfneal\GooglePlaces\Actions\Abstracts;


use Sfneal\Actions\AbstractAction;
use Sfneal\GooglePlaces\Actions\CurlRequestAction;

abstract class PlacesSearchAction extends AbstractAction
{
    /**
     * @var array Longitude & Latitude of the location biases (Milford, MA)
     */
    private $location_bias_coords;

    /**
     * @var int A radius in miles from location bias coordinates
     */
    private $radius_bias;

    /**
     * @var string Google places country code (defaults to 'us')
     */
    private $country;

    /**
     * @var string Query parameters
     */
    public $query;

    /**
     * @var array Places predictions results
     */
    public $results;

    /**
     * @var null Place ID for retrieving a zip or other information about a place
     */
    public $place_id;

    /**
     * PlacesSearchAction constructor.
     *
     * @param string $query
     * @param null $place_id
     */
    public function __construct(string $query, $place_id = null)
    {
        // Set params
        $this->query = self::sanitize($query);
        $this->place_id = $place_id;

        // Set optional env values
        $this->location_bias_coords = env('GOOGLE_PLACES_LOCATION_BIAS_COORD');
        $this->radius_bias = env('GOOGLE_PLACES_RADIUS');
        $this->country = env('GOOGLE_PLACES_COUNTRY', 'us');
    }

    /**
     * Retrieve the API endpoint for a google places AutocompleteCity search
     *
     * @return string
     */
    public function getEndpoint(): string {
        $endpoint = 'https://maps.googleapis.com/maps/api/place/autocomplete/json?input=' . $this->query;
        $endpoint .= '&types=(regions)';
        $endpoint .= '&region=us';

        // Add location bias if set
        if (isset($this->location_bias_coords)) {
            $endpoint .= '&location=' . str_replace(' ', '', $this->location_bias_coords);
        }

        // Add radius bias if set
        if (isset($this->radius_bias)) {
            $endpoint .= '&radius=' . $this->radius_bias;
        }

        // Add language
        $endpoint .= '&language=en_EN';
        $endpoint .= '&components=country:' . $this->country;
        $endpoint .= '&key=' . env('GOOGLE_API_KEY');
        return $endpoint;
    }

    /**
     * Parse the Google Places API response to retrieve results set
     *
     * @param $response
     * @return array|string
     */
    abstract public function parseResponse($response);

    /**
     * Remove spaces and forbidden characters from query string
     *
     * @param $query
     * @return string|string[]
     */
    private static function sanitize($query) {
        return str_replace(' ', '-', $query);
    }

    /**
     * Retrieve the API URL endpoint, cURL execute the request and return response
     *
     * @return mixed
     */
    public function execute() {
        return $this->parseResponse(CurlRequestAction::execute($this->getEndpoint()));
    }
}
