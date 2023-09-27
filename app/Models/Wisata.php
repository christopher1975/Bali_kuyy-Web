<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    protected $fillable= [
        'nama_wisata',
        'alamat',
        'gambar',
        'deskripsi',
        'rating'
    ];
    
    public function feedback() {
        return $this->hasMany('App\Models\Feedback');
    }
}