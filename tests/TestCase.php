<?php

namespace Sfneal\GooglePlaces\Tests;

use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Sfneal\GooglePlaces\Providers\GooglePlacesServiceProvider;

class TestCase extends OrchestraTestCase
{
    /**
     * Register package service providers.
     *
     * @param Application $app
     * @return array|string
     */
    protected function getPackageProviders($app)
    {
        return [
            GooglePlacesServiceProvider::class
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
