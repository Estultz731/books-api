<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Author;

class AuthorApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_method()
    {
        $newAuthor = Author::create(['first_name' => 'Bram', 'last_name' => 'Stoker']);
        $response = $this->get('/authors/' . $newAuthor->id);
        $authorResponse = json_decode($response->getContent());

        $response->assertStatus(200);
        $this->assertEquals($newAuthor->first_name, $authorResponse->first_name);
        $this->assertEquals($newAuthor->last_name, $authorResponse->last_name);
    }

    public function test_index_method()
    {
        //Creating the conditions for the test.
        $authorOne = Author::create(['first_name' => 'Bram', 'last_name' => 'Stoker']);
        $authorTwo = Author::create(['first_name' => 'Mary', 'last_name' => 'Shelley']);

        $response = $this->get('/authors');
        $authorsResponse = json_decode($response->getContent());
        
        $response->assertStatus(200);
        $this->assertCount(2, $authorsResponse);
    }

    public function test_it_can_delete_author()
    {
        $author = Author::create(['first_name' => 'Bram', 'last_name' => 'Stoker']);

        $response = $this->delete('/authors/' . $author->id);

        $authorsResponse = json_decode($response->getContent());
        
        $response->assertStatus(200);
        $this->assertCount(0, Author::all());
        $this->assertEquals('Ok', $authorsResponse);
    }
}
