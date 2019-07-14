<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FilmGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=3; $i<10; $i++) {
            DB::table('film_genre')->insert([
                'film_id' => $i,
                'genre_id' => random_int(1,10),
            ]);
        }
    }
}
