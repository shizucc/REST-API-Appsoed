<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GensoedMerchandise extends Model
{
    use HasFactory;
    protected $table = 'gensoed_merchandises';
    protected $guarded = [];
    public $timestamps = false;

}
