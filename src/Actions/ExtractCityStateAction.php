<?php


namespace Sfneal\GooglePlaces\Actions;


use Sfneal\Actions\AbstractActionStatic;
use Sfneal\GooglePlaces\Actions\Traits\States;

class ExtractCityStateAction extends AbstractActionStatic
{
    use States;

    /**
     * Extract a (city, state) string from a google places API return that may contain a zip code
     *
     * @param string $description
     * @return array
     */
    public static function execute(string $description)
    {
        // Check that the place description contains a comma string
        if (strpos($description, ', ') !== false) {
            // Separate city and state strings
            list($city, $state) = explode(', ', $description);

            // Check if the state string contains more than a state code
            if (strlen(trim($state)) > 2 && strpos($state, ' ') !== false) {
                // Extract the zip code
                list($state, $zip) = explode(' ', $state);
            }
            return [$city, $state];

        } else {
            return ['', self::stateAbbreviation($description)];
        }
    }
}
