<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComicImage extends Model
{
    use HasFactory;
    protected $table = 'comic_images';
    protected $guarded = [];
    public $timestamps = false;

    public function Comic(){
        return $this->belongsTo(Comic::class);
    }
}
