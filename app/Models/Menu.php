<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    
    // Pastikan kolom-kolom ini ada di $fillable
    protected $fillable = [
        'nama_menu',
        'harga',
        'foto', 
    ];
}

