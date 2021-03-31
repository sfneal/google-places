<?php

namespace Sfneal\GooglePlaces\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Sfneal\Controllers\Controller;
use Sfneal\GooglePlaces\Services\Autocomplete;

class PlacesController extends Controller
{
    /**
     * Execute a Google Place API city search.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function city(Request $request): JsonResponse
    {
        return response()->json(Autocomplete::city($request->input('q')));
    }

    /**
     * Execute a Google Place API zip search.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function zip(Request $request): JsonResponse
    {
        return response()->json(Autocomplete::zip($request->input('q')));
    }
}
