<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Film;
use App\User;

class CommentController extends Controller
{
    public function films($id)
    {
        $film = Film::findOrFail($id);
        $this->data['comments'] = $film->getComments();
        $this->data['comments']->withPath(route('films.show', $id));
        return view('comments.index', $this->data);
    }

    public function users($id, Request $request)
    {
        $user = User::findOrFail($id);
        $this->data['comments'] = $user->getComments();
        $this->data['comments']->withPath(route('profile.show', $user->name));
        if($request->get('hide_count'))
            $this->data['hide_count'] = 1;
        return view('comments.index', $this->data);
    }
}
