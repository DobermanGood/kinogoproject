<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
    protected $fillable = ['name'];

    public function films()
    {
        return $this->belongsToMany('App\Film');
    }

    public function filmId()
    {
        return $this->belongsToMany('App\Film');
    }

    public function genreId()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function getRecommends($id)
    {
        $recommends = $this->films()->where('active', 1)->whereKeyNot($id)->orderBy('year_date', 'desc')->take(5)->get();
        return $recommends;
    }
}
