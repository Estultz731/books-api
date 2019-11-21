<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Carbon\Carbon;

use Illuminate\Http\Request;

class BooksController extends Controller
{
  public function index(Request $request)
  {
    //Get all books with authors
    //If there is no publication date query param, just return all the books.
    if(!$request->query('publication_date')) {
      $books = Book::with('author')->get();
      //Return books as json
      return response()
        ->json($books);
    }

    if ($request->query('publication_date') === 'future') {
      $futureBooks = Book::where('publication_date', '>', Carbon::now()->toDateTimeString())->with('author')->get();
      return response()
        ->json($futureBooks);
    }

    $pastBooks = Book::where('publication_date', '<', Carbon::now()->toDateTimeString())->with('author')->get();

    return response()
      ->json($pastBooks);

  
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
  public function store(Request $request)
  {
    $title = $request->input('title');
    $publicationDate = $request->input('publication_date');
    $authorId = $request->input('author_id');
    $book = Book::create(['title' => $title, 'publication_date' => $publicationDate, 'author_id' => $authorId]);

    return response()
      ->json($book);
  }

  public function home()
  {
    return view('books.index', ['books' => Book::all()]);
  }

  public function showOneBook($bookId)
  {
    $book = Book::find($bookId);
    return view('books.show', ['book' => $book]);
  }
}