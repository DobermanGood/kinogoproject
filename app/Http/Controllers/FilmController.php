<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Genre;
use App\Vote;

class FilmController extends Controller
{
    public function index(Request $request, Film $film)
    {
        $this->data['films'] = $film->getFilms();
        return view('films.index', $this->data);
    }

    public function show($id, Film $film)
    {
        $this->data['film'] = $film->getFilm($id);
        $this->data['genres'] = $this->data['film']->genres()->firstOrfail();
        $this->data['recommends'] = $this->data['genres']->getRecommends($id);
        return view('films.show', $this->data);
    }

    public function order($by, $value, Film $film)
    {
        $this->data['films'] = $film->getOrderedFilms($by, $value);
        return view('films.index', $this->data);
    }

    public function vote(Request $request, $id)
    {
        $this->validate($request, [
            'value' => 'required|max:5|min:1'
        ]);

        $film = Film::findOrFail($id);
        return $request->user()->id;
        $already_vote = Vote::where('user_id', $request->user()->id)->where('film_id', $film->id)->first();
        if($already_vote)
            return response('Уже голосовали', '403');
        $vote = new Vote;
        $vote->film_id = $film->id;
        $vote->user_id = $request->user()->id;
        $vote->value = $request->value;
        $vote->save();
        return response('ok');
    }
}
