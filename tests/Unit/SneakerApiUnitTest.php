<?php

namespace Tests\Unit;

use Tests\TestCase;

/**
 * @group unit
 */
class SneakerApiUnitTest extends TestCase
{
    /**
     * Get All Sneakers.
     *
     * @return void
     */
    public function testGetAllSneakers()
    {
        $response = $this->json('GET', '/api/sneakers');

        $response->assertStatus(200);
    }

    /**
     * Get Sneaker By Id.
     *
     * @return void
     */
    public function testGetSneakerById()
    {
        $data = 1;

        $response = $this->json('GET', "/api/sneakers/{$data}");

        $response->assertStatus(200);

        $response->assertJsonFragment(['id' => $data]);
    }

    /**
     * Get All Rankings For Sneaker By Id.
     *
     * @return void
     */
    public function testGetAllRankingsForSneakerById()
    {
        $sneakerId = 1;

        $response = $this->json('GET', "/api/sneakers/{$sneakerId}/rankings");

        $response->assertStatus(200);
    }
}
