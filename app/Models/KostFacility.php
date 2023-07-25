<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KostFacility extends Model
{
    use HasFactory;
    protected $table = 'kost_facilities';
    public $timestamps = false;
    protected $guarded = [];

    public function kost(){
        return $this->belongsTo(Kost::class);
    }
}
