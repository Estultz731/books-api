<?php

namespace App\Http\Controllers;

use App\Author;

class AuthorsController extends Controller
{
  public function index()
  {
    $authors = Author::all();
    return response()
      ->json($authors);
  }

  public function show($id)
  {
    $author = Author::find($id);
    return response()
      ->json($author);
  }

  public function destroy($id)
  {
    Author::find($id)->delete();
    return response()
      ->json('Ok');
  }
}

