<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GenreApiTest extends TestCase {
  use RefreshDatabase;
  /**
   * A basic feature test example.
   *
   * @return void
   */

   public function test_genres_index_method()
   {
    $response = $this->get('api/genres');
    $genresResponse = json_decode($response->getContent());
    
    $response->assertStatus(200);
    $this->assertEquals(5, count($genresResponse));

   }

}