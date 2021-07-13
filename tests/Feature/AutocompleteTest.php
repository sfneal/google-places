<?php

namespace Sfneal\GooglePlaces\Tests\Feature;

use Sfneal\GooglePlaces\Services\Autocomplete;
use Sfneal\GooglePlaces\Tests\TestCase;

class AutocompleteTest extends TestCase
{
    /** @test */
    public function city()
    {
        $this->contentAssertions(Autocomplete::city('franklin'), 5);
        $this->contentAssertions(Autocomplete::city('02038'), 1);
        $this->contentAssertions(Autocomplete::city('boston'), 5);
    }

    /** @test */
    public function zip()
    {
        $this->contentAssertions(Autocomplete::zip('0203'), 4, ['id', 'text']);
        $this->contentAssertions(Autocomplete::zip('02038'), 1, ['id', 'text']);
    }
}
