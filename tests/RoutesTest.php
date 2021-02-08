<?php


namespace Sfneal\GooglePlaces\Tests;


class RoutesTest extends TestCase
{
    /** @test */
    public function city_route_can_be_accessed()
    {
        $uri = route('places.city', ['q' => 'franklin']);

        // Get request the route
        $this->get($uri)
            ->assertStatus(200);
    }
}
