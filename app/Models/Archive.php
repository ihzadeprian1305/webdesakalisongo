<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;
    protected $table = 'archives';
    protected $primaryKey = 'id_archive';

    public function users_created_at() {
        return $this -> belongsTo("App\Models\User","id_user_created_at");
    }
    
    public function users_updated_at() {
        return $this -> belongsTo("App\Models\User","id_user_updated_at");
    }
}
