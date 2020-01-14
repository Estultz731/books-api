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

   public function test_genres_show_method()
   {
     //Set up the world
     //We don't need to do this because we already have genres
     //that are set up in our migrations
     //Call the function
     $response = $this->get('api/genres/1');
     $genresResponse = json_decode($response->getContent());
     //Make assertions
     //We want to assert that the status of the response is 200 or ok
     $response->assertStatus(200);
     $this->assertEquals('horror', $genresResponse->name);
   }
}