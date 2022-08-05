<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriticAndSuggestion extends Model
{
    use HasFactory;
    protected $table = 'criticsandsuggestions';
    protected $primaryKey = 'id_criticandsuggestion';
}
