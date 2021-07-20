<?php

namespace Sfneal\GooglePlaces\Tests\Unit;

use Sfneal\GooglePlaces\Services\Autocomplete;
use Sfneal\GooglePlaces\Tests\TestCase;

class AutocompleteTest extends TestCase
{
    /**
     * @test
     * @dataProvider cityProvider
     * @param string $query
     * @param int $expectedResults
     */
    public function city(string $query, int $expectedResults)
    {
        $this->contentAssertions(Autocomplete::city($query), $expectedResults);
    }

    /**
     * @test
     * @dataProvider zipProvider
     * @param string $query
     * @param int $expectedResults
     * @param array $contentKeys
     */
    public function zip(string $query, int $expectedResults, array $contentKeys)
    {
        $this->contentAssertions(Autocomplete::zip($query), $expectedResults, $contentKeys);
    }
}
