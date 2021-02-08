<?php

namespace Sfneal\GooglePlaces\Tests;

use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Sfneal\GooglePlaces\Providers\GooglePlacesServiceProvider;

class TestCase extends OrchestraTestCase
{
    /**
     * Define environment setup.
     *
     * @param Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('google-places.api_key', 'AIzaSyCegAST-8uaP6HcprMTfAeiD2Ku-UKEmSw');
        $app['config']->set('google-places.location_bias', '42.1399, -71.5163');
        $app['config']->set('google-places.radius', '500');
        $app['config']->set('google-places.country', 'us');
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
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }
}
