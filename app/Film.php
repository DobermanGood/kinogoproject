<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Film extends Model
{
    protected $table = 'films';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $dates = ['created_at', 'updated_at', 'premier_date'];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getPremierDateAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function setVideoAttribute($value)
    {
        $src = json_decode($value);
        $src[0]->download_link = "/storage/".$src[0]->download_link;
        $src = json_encode($src);
        $this->attributes['video'] = $src;
    }

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = "/storage/".$value;
           // return "/storage/".$value;
    }   

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function author()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function images()
    {
        return $this->morphToMany('App\Image', 'imageble');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    public function getFilms()
    {
        $films = $this->active()->latest()->with('votes')->paginate(10);
        return $films;
    }

    public function getFilm($id)
    {
        $film = $this->active()->where('id', $id)->with('votes', 'images')->firstOrFail();
        return $film;
    }

    public function getOrderedFilms($by, $value)
    {

        $films = $this->active()->where($by, $value)->latest()->with('votes')->paginate(10);
        return $films;
    }

    public function getComments()
    {
        $comments = $this->comments()->where('active', 1)->latest()->with('user')->paginate(10);
        return $comments;
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
