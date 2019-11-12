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
    $response = $this->get('api/books');
    $booksResponse = json_decode($response->getContent());
    
    $response->assertStatus(200);
    $this->assertCount(1, $booksResponse);
    $this->assertEquals('Stephen', $booksResponse[0]->author->first_name);
   }

   public function test_books_show_method()
   {
     //Create the conditions so that we can run the test.
     $author = Author::create(['first_name' => 'Bram', 'last_name' => 'Stoker']);

     $book = Book::create(['title' => 'Dracula', 'publication_date' => Carbon::now()->toDateTimeString(), 'author_id' => $author->id]);

     //Call the api endpoint and store the response in a variable.
     $response = $this->get("api/books/$author->id");
     $booksResponse = json_decode($response->getContent());

     $response->assertStatus(200);
     $this->assertEquals('Dracula', $booksResponse->title);
     $this->assertEquals('Bram', $booksResponse->author->first_name);
   }

   public function test_it_can_delete_book()
   {
     $author = Author::create(['first_name' => 'Anne', 'last_name' => 'Rice']);

     $book = Book::create(['title' => 'Interview With a Vampire', 'publication_date' => Carbon::now()->toDateTimeString(), 'author_id' => $author->id]);

     $response = $this->delete('api/books/' . $author->id);
     $booksResponse = json_decode($response->getContent());

     $response->assertStatus(200);
     $this->assertCount(0, Book::all());
     $this->assertEquals('Deleted', $booksResponse);
   }
}