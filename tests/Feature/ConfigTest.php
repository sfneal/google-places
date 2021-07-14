<?php


namespace Sfneal\GooglePlaces\Tests\Feature;


use Sfneal\GooglePlaces\Tests\TestCase;

class ConfigTest extends TestCase
{
    /** @test */
    public function api_key()
    {
        $expected = getenv('GOOGLE_PLACES_API_KEY');
        $output = config('google-places.api_key');

        $this->assertNotNull($output);
        $this->assertIsString($output);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function location_bias()
    {
        $expected = getenv('GOOGLE_PLACES_LOCATION_BIAS_COORD');
        $output = config('google-places.location_bias');

        $this->assertNotNull($output);
        $this->assertIsString($output);
        $this->assertStringContainsString(', ', $output);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function radius()
    {
        $expected = intval(getenv('GOOGLE_PLACES_RADIUS'));
        $output = intval(config('google-places.radius'));

        $this->assertNotNull($output);
        $this->assertIsInt($output);
        $this->assertEquals($expected, $output);
    }

    /** @test */
    public function country()
    {
        $expected = getenv('GOOGLE_PLACES_COUNTRY');
        $output = config('google-places.country');

        $this->assertNotNull($output);
        $this->assertIsString($output);
        $this->assertEquals($expected, $output);
    }
}
