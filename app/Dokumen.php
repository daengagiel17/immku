<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $fillable = ['judul', 'foto', 'url_pdf'];
}
