<?php

namespace Tests\Unit;

use Tests\TestCase;

/**
 * @group unit
 */
class SneakerApiUnitTest extends TestCase
{
    /**
     * Get All Sneakers
     *
     * @return void
     */
    public function testGetAllSneakers()
    {
        $response = $this->json('GET', '/api/sneakers');

        $response->assertStatus(200);
    }

}
