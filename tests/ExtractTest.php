<?php

namespace Sfneal\GooglePlaces\Tests;

use Sfneal\GooglePlaces\Extract;

class ExtractTest extends TestCase
{
    /**
     * @var string Place description
     */
    public $description = 'Franklin, MA 02038';

    /** @test */
    public function cityState()
    {
        [$city, $state] = Extract::cityState($this->description);

        $this->assertEquals('Franklin', $city);
        $this->assertEquals('MA', $state);
    }

    /** @test */
    public function zip()
    {
        $zip = Extract::zip($this->description);

        $this->assertEquals('02038', $zip);
    }

    /** @test */
    public function city()
    {
        $city = Extract::city($this->description);

        $this->assertEquals('Franklin', $city);
    }

    /** @test */
    public function state()
    {
        $state = Extract::state($this->description);

        $this->assertEquals('MA', $state);
    }
}
