<?php

use Illuminate\Database\Seeder;
use App\Berita;

class BeritaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Berita::create([
            'judul' => 'Muhammadiyah',
            'detail' => 'muh',
            'sumber' => 'irit.io',
            'star_name' => 'muhammadiyah',
            'url' => 'img/profile/default.png',
            'foto' => 'img/profile/default.png',
        ]);
    }
}
