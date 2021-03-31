<?php

namespace Sfneal\GooglePlaces\Services;

use Sfneal\GooglePlaces\Actions\AutocompleteCityAction;
use Sfneal\GooglePlaces\Actions\AutocompleteZipAction;

class Autocomplete
{
    /**
     * Autocomplete a 'city' name query.
     *
     * @param string $query
     * @return array|mixed|string
     */
    public static function city(string $query)
    {
        return (new AutocompleteCityAction($query))->execute();
    }

    /**
     * Autocomplete a 'zip code' query.
     *
     * @param string $query
     * @return array|mixed|string
     */
    public static function zip(string $query)
    {
        return (new AutocompleteZipAction($query))->execute();
    }
}
