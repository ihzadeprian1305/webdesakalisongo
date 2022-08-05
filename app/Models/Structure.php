<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;
    protected $table = 'structures';
    protected $primaryKey = 'id_structure';

    public function positions() {
        return $this -> belongsTo("App\Models\Position","id_position");
    }
}
