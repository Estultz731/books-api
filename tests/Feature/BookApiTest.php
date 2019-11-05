<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Author;
use App\Book;
use Carbon\Carbon;

class BookApiTest extends TestCase {
  use RefreshDatabase;
  /**
   * A basic feature test example.
   *
   * @return void
   */

   public function test_books_index_method()
   {
     //Create author and books
     $author = Author::create(['first_name' => 'Stephen', 'last_name' => 'King']);
     $book = Book::create([
       'title' => 'Carrie', 
       'publication_date' => Carbon::now()->toDateTimeString(),
       'author_id' => $author->id 
    ]);
    $response = $this->get('/books');
    $booksResponse = json_decode($response->getContent());
    
    $response->assertStatus(200);
    $this->assertCount(1, $booksResponse);
    $this->assertEquals('Stephen', $booksResponse[0]->author->first_name);
   }
}