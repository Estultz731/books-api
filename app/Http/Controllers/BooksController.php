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
}