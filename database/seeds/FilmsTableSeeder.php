<?php

use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Film::class, 20)->create();

        /*
        DB::table('films')->insert([
            'active' => 0,
            'title' => str_random('10'),
            'exceprt' => str_random('100'),
            'image' => 'http://localhost:8000/background.jpg',
            'video' => 'http://localhost:8000/background.jpg',
            'country' => 'США',
            'bloor' => 'HDRip',
            'translate' => 'Профессиональный (многоголосый)',
            'long' => '1:30:10',
            'year_date' => random_int(2000, 2017),
            'premier_date' => '2017-11-01',
            'created_at' => '2017-11-01',
            'updated_at' => '2017-11-01'
        ]);*/
    }
}
