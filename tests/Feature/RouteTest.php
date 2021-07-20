<?php

namespace Sfneal\GooglePlaces\Tests\Feature;

use Sfneal\GooglePlaces\Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * @test
     * @dataProvider cityProvider
     * @param string $query
     * @param int $expectedResults
     */
    public function city_route_can_be_accessed(string $query, int $expectedResults)
    {
        $this->responseAssertions(route('places.city', ['q' => $query]), $expectedResults);
    }

    /**
     * @test
     * @dataProvider zipProvider
     * @param string $query
     * @param int $expectedResults
     * @param array $contentKeys
     */
    public function zip_route_can_be_accessed(string $query, int $expectedResults, array $contentKeys)
    {
        $this->responseAssertions(route('places.zip', ['q' => $query]), $expectedResults, $contentKeys);
    }
}
