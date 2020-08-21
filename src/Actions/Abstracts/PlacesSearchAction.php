<?php


namespace Sfneal\GooglePlaces\Actions\Abstracts;


use Sfneal\Actions\AbstractAction;
use Sfneal\GooglePlaces\Actions\CurlRequestAction;

abstract class PlacesSearchAction extends AbstractAction
{
    /**
     * todo: make this optional
     * Longitude & Latitude of the location biases (Milford, MA)
     */
    protected const LOCATION_BIAS_COORDINATES = [42.1399, -71.5163];

    /**
     * todo: make this optional
     * A radius in miles from location bias coordinates
     */
    protected const RADIUS = 500;

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
        $this->query = self::sanitize($query);
        $this->place_id = $place_id;
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
        $endpoint .= '&location=' . implode(',', self::LOCATION_BIAS_COORDINATES);
        $endpoint .= '&radius=' . self::RADIUS;
        $endpoint .= '&language=en_EN';
        $endpoint .= '&components=country:us';
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
