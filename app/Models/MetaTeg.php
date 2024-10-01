<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaTeg extends Model
{
    protected $connection = 'mysql_admin';
    protected $table = 'meta_tegs';
    protected $fillable = [
        'id', 'name', 'code', 'status', 'position', 'created_at', 'updated_at', 'deleted_at', 'all_pages', 'slug'
    ];
}
