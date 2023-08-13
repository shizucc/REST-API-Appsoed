<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'comics';

    public $timestamps = false;

    public function comicImages(){
        return $this->hasMany(ComicImage::class);
    }
}
