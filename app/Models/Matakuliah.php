<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    public $timestamps = false; // <--- Tambahkan ini

    protected $fillable = ['kode', 'nama', 'jadwal'];
}
