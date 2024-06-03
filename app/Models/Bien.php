<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;
    // 'category_id' user_id
    protected $fillable = [
        'nom',
        'image',
        'description',
        'adresse',
        'statut',
        'surface',
        'prix'
    ];
}
