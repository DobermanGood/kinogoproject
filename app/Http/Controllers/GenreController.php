<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenreController extends Controller
{
    public function show($id, Genre $genre)
    {
        $this->data['genre'] = Genre::findOrFail($id);
        $this->data['films'] = $this->data['genre']->films()->where('active', 1)->paginate(10);
        return view('genres.index', $this->data);
    }
}
