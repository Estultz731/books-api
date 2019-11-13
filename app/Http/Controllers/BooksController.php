<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;

use Illuminate\Http\Request;

class BooksController extends Controller
{
  public function index()
  {
    //Get all books with authors
    $books = Book::with('author')->get();
    //Return books as json
    return response()
      ->json($books);
  }

  public function show($id)
  {
    $book = Book::with('author')->find($id);
    return response()
      ->json($book);
  }

  public function destroy($id)
  {
    Book::find($id)->delete();
    return response()
      ->json('Deleted');
  }

  public function update($id, Request $request)
  {
    Book::find($id)->update($request->input());
    $updatedBook = Book::find($id);

    return response()
      ->json($updatedBook);
  }
}