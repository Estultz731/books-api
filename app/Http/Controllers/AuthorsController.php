<?php

namespace App\Http\Controllers;

use App\Author;

use Illuminate\Http\Request;

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

  public function store(Request $request)
  {
    //Get the first name and last name from the request 
    $firstname = $request->input('first_name');
    $lastname = $request->input('last_name');
    //Create a new author using the Author model
    $author = Author::create(['first_name' => $firstname, 'last_name' => $lastname]);
    //Return the model as json
    return response()
      ->json($author);
  }

  public function update($id, Request $request)
  {
    //Find the author by the id and update it using the request
    Author::find($id)->update($request->input());
    //Refetch the author and return it as json
    $updatedAuthor = Author::find($id);

    return response()
      ->json($updatedAuthor);
  }

  public function home()
  {
    return view('authors.index', ['authors' => Author::all()]);
  }
}

