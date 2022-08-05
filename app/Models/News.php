<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $primaryKey = 'id_news';

    public function users_created_at() {
        return $this -> belongsTo("App\Models\User","id_user_created_at");
    }
    
    public function users_updated_at() {
        return $this -> belongsTo("App\Models\User","id_user_updated_at");
    }
}
