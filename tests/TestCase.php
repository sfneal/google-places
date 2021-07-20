<?php

namespace Sfneal\GooglePlaces\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Sfneal\GooglePlaces\Providers\GooglePlacesServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * Define environment setup.
     *
     * @param Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // make sure, our .env file is loaded
        $app->useEnvironmentPath(__DIR__.'/..');
        $app->bootstrapWith([LoadEnvironmentVariables::class]);

        $app['config']->set('google-places.api_key', getenv('GOOGLE_PLACES_API_KEY'));
        $app['config']->set('google-places.location_bias', getenv('GOOGLE_PLACES_LOCATION_BIAS_COORD'));
        $app['config']->set('google-places.radius', getenv('GOOGLE_PLACES_RADIUS'));
        $app['config']->set('google-places.country', getenv('GOOGLE_PLACES_COUNTRY'));
    }

    /**
     * Register package service providers.
     *
     * @param Application $app
     * @return array|string
     */
    protected function getPackageProviders($app)
    {
        return [
            GooglePlacesServiceProvider::class,
        ];
    }

    /**
     * Execute response assertions for route test methods.
     *
     * @param string $uri
     * @param int $expectedResults
     * @param array $contentKeys
     */
    protected function responseAssertions(string $uri, int $expectedResults, array $contentKeys = ['id', 'text', 'place_id']): void
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
        $this->contentAssertions((array) json_decode($response->content(), true), $expectedResults, $contentKeys);
    }

    /**
     * Execute content assertions.
     *
     * @param array $content
     * @param int $expectedResults
     * @param array|string[] $contentKeys
     */
    protected function contentAssertions(array $content, int $expectedResults, array $contentKeys = ['id', 'text', 'place_id']): void
    {
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
