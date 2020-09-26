<?php

namespace Tests\Unit;

use Tests\TestCase;

/**
 * @group unit
 */
class SneakerApiUnitTest extends TestCase
{
    /**
     * Get Sneaker By Id.
     *
     * @return void
     */
    public function testGetSneakerById()
    {
        $response = $this->json('GET', '/api/sneakers');
        $response->assertStatus(200);
    }
}
