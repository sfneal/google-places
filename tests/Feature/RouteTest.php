<?php

namespace Sfneal\GooglePlaces\Tests\Feature;

use Sfneal\GooglePlaces\Tests\TestCase;

class RouteTest extends TestCase
{
    /** @test */
    public function city_route_can_be_accessed()
    {
        $this->responseAssertions(route('places.city', ['q' => 'franklin']), 5);
        $this->responseAssertions(route('places.city', ['q' => 'boston']), 5);
        $this->responseAssertions(route('places.city', ['q' => '02038']), 1);
    }

    /** @test */
    public function zip_route_can_be_accessed()
    {
        $this->responseAssertions(route('places.zip', ['q' => '02038']), 1, ['id', 'text']);
    }
}
