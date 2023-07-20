<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KostImage extends Model
{
    use HasFactory;
    protected $table = 'kost_images';
    public $timestamps = false;
    protected $guarded = [];

    public function kost(){
        return $this->belongsTo(Kost::class);
    }
}
