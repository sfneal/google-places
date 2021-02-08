<?php


namespace Sfneal\GooglePlaces\Tests;


class RoutesTest extends TestCase
{
    /** @test */
    public function city_route_can_be_accessed()
    {
        // Declare the URI
        $uri = route('places.city', ['q' => 'franklin']);

        // Get request the route
        $response = $this->get($uri);

        // Run assertions on the response
        $response
            ->assertJson([
                'total_count' => 5
            ])
            ->assertStatus(200);

        // Extract & decode content from response
        $content = (array) json_decode($response->content(), true);

        // Run assertions on the responses content
        $this->assertArrayHasKey('total_count', $content);
        $this->assertArrayHasKey('items', $content);
        $this->assertCount(5, $content['items']);
        foreach ($content['items'] as $item) {
            foreach (['id', 'text', 'place_id'] as $key) {
                $this->assertArrayHasKey($key, $item);
                $this->assertIsString($item[$key]);
            }
        }
    }
}
