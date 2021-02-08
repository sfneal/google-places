<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google API Key
    |--------------------------------------------------------------------------
    |
    | Provide a Google Places API key in order to execute places queries.
    |
    */
    'api_key' => env('GOOGLE_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Google Places Location Bias coordinates
    |--------------------------------------------------------------------------
    |
    | Provide a set of coordinates in order to bias results towards a particular
    | city or region.
    |
    */
    'location_bias' => env('GOOGLE_PLACES_LOCATION_BIAS_COORD'),

    /*
    |--------------------------------------------------------------------------
    | Google Places Radius
    |--------------------------------------------------------------------------
    |
    | Radius in miles to surrounding the location_bias coordinates that will
    | bias results.
    |
    */
    'radius' => env('GOOGLE_PLACES_RADIUS'),

    /*
    |--------------------------------------------------------------------------
    | Google Places Country
    |--------------------------------------------------------------------------
    |
    | Country code of the country you would like to return place results from.
    |
    */
    'country' => env('GOOGLE_PLACES_COUNTRY', 'us'),
];
