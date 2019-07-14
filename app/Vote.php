<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
	public function filmId()
    {
        return $this->belongsTo('App\Film');
    }

    public function userId()
    {
        return $this->belongsTo('App\User');
    }
}
