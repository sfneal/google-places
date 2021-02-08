<?php


namespace Sfneal\GooglePlaces;


use Sfneal\Actions\AbstractService;
use Sfneal\GooglePlaces\Actions\Traits\States;

class Extract extends AbstractService
{
    use States;

    /**
     * Extract a (city, state) string from a google places API return that may contain a zip code.
     *
     * @param string $description
     * @return array
     */
    public static function cityState(string $description): array
    {
        // Check that the place description contains a comma string
        if (strpos($description, ', ') !== false) {
            // Separate city and state strings
            [$city, $state] = explode(', ', $description);

            // Check if the state string contains more than a state code
            if (strlen(trim($state)) > 2 && strpos($state, ' ') !== false) {
                // Extract the zip code
                [$state, $zip] = explode(' ', $state);
            }

            return [$city, $state];
        } else {
            return ['', self::stateAbbreviation($description)];
        }
    }

    /**
     * Extract a zip code string from a google places API return that may contain a zip code.
     *
     * @param string $description
     * @return array
     */
    public static function zip(string $description): ?array
    {
        // Check that the place description contains a comma string
        if (strpos($description, ', ') !== false) {
            // Separate city and state strings
            [$city, $state] = explode(', ', $description);

            // Check if the state string contains more than a state code
            if (strlen(trim($state)) > 2 && strpos($state, ' ') !== false) {
                // Extract the zip code
                [$state, $zip] = explode(' ', $state);

                return $zip;
            }
        }

        return null;
    }

    /**
     * Extract a city from a google places API return
     *
     * @param string $description
     * @return string|null
     */
    public static function city(string $description): ?string
    {
        return self::cityState($description)[0];
    }

    /**
     * Extract a state from a google places API return
     *
     * @param string $description
     * @return string|null
     */
    public static function state(string $description): ?string
    {
        return self::cityState($description)[1];
    }
}
