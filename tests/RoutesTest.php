<?php

namespace Sfneal\GooglePlaces\Tests;

class RoutesTest extends TestCase
{
    /** @test */
    public function city_route_can_be_accessed()
    {
        $this->assertions(route('places.city', ['q' => 'franklin']), 5);
        $this->assertions(route('places.city', ['q' => '02038']), 1);
    }

    /** @test */
    public function zip_route_can_be_accessed()
    {
        $this->assertions(route('places.zip', ['q' => '02038']), 1, ['id', 'text']);
    }

    /**
     * Execute assertions for route test methods.
     *
     * @param string $uri
     * @param int $expectedResults
     * @param array $contentKeys
     */
    private function assertions(string $uri, int $expectedResults, array $contentKeys = ['id', 'text', 'place_id']): void
    {
        // Get request the route
        $response = $this->get($uri);

        // Run assertions on the response
        $response
            ->assertJson([
                'total_count' => $expectedResults,
            ])
            ->assertStatus(200);

        // Extract & decode content from response
        $content = (array) json_decode($response->content(), true);

        // Run assertions on the responses content
        $this->assertArrayHasKey('total_count', $content);
        $this->assertArrayHasKey('items', $content);
        $this->assertCount($expectedResults, $content['items']);
        foreach ($content['items'] as $item) {
            foreach ($contentKeys as $key) {
                $this->assertArrayHasKey($key, $item);
                $this->assertIsString($item[$key]);
            }
        }
    }
}
