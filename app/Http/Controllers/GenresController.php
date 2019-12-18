<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenresController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return response()->json($genres);
        
    }
}
