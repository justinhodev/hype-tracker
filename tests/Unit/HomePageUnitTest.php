<?php

namespace Tests\Unit;

use Tests\TestCase;

/**
 * @group unit
 */
class HomePageUnitTest extends TestCase
{
    /**
     * Get Home Page.
     *
     * @return void
     */
    public function testGetHomePage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeLivewire('ShowSneakers');
    }
}
