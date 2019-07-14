<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmGenre extends Model
{
	protected $table = 'film_genre';
	
    public function filmId()
    {
        return $this->belongsToMany('App\Film');
    }

    public function genreId()
    {
        return $this->belongsToMany('App\Genre');
    }
}
