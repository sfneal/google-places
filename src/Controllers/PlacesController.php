<?php

namespace Sfneal\GooglePlaces\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Sfneal\Controllers\AbstractController;
use Sfneal\GooglePlaces\AutocompleteCityAction;
use Sfneal\GooglePlaces\AutocompleteZipAction;

class PlacesController extends AbstractController
{
    /**
     * Execute a Google Place API city search.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function city(Request $request): JsonResponse
    {
        return response()->json((new AutocompleteCityAction($request->input('q')))->execute());
    }

    /**
     * Execute a Google Place API zip search.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function zip(Request $request): JsonResponse
    {
        return response()->json((new AutocompleteZipAction($request->input('q')))->execute());
    }
}
