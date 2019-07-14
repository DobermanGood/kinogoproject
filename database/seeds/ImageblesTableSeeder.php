<?php

use Illuminate\Database\Seeder;

class ImageblesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<16; $i++) {
            DB::table('imagebles')->insert([
                'image_id' => $i,
                'imageble_id' => random_int(1,5),
                'imageble_type' => 'App\Film',
            ]);
        }
    }
}
