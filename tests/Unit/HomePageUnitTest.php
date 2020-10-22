<?php

namespace Tests\Unit;

use App\Http\Livewire\SneakerList;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @group unit
 */
class HomePageUnitTest extends TestCase
{
    /**
     * Get Home Page from External HTTP Request.
     *
     * @return void
     */
    public function testGetHomePage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeLivewire('sneaker-list');
    }

    /**
     * Ensure Search Result on Livewire Component.
     *
     * @return void
     */
    public function testUseSearchComponent()
    {
        $searchString = 'lorem ipsum';

        Livewire::test(SneakerList::class, ['search' => $searchString])
            ->assertSet('search', $searchString);
    }
}
