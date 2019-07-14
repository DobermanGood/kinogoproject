<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Genre;
use App\Film;
use Carbon\Carbon;

class KinogoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->carousel();
        $this->navigation();
        Carbon::setLocale('ru');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function navigation()
    {
        View::composer('components.navigation', function($view) {
            $view->with('navigation', Genre::orderBy('name', 'asc')->get());
        });
    }

    public function carousel()
    {
        View::composer('components.carousel', function($view) {
            $films = Film::orderBy('year_date', 'desc')->active()->select('image', 'id', 'title')->take(12)->get();

            if($films->count())
                $view->with('carousel',  $films);
        });
    }
}
