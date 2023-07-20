<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kosts';
    protected $guarded =[];
    protected $casts =[
        'images' => 'array',
        'type' => 'array',
        'facilities' => 'array',   
        'rooms_type' => 'array',
    ];

    public function kostImage(){
        return $this->hasMany(KostImage::class);
    }
}
