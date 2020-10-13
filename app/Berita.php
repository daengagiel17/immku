<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{

    protected $fillable = ['judul', 'detail', 'star_name', 'url', 'sumber', 'foto'];

}


