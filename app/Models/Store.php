<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $connection = 'mysql_admin';

    public function metaTeg()
    {
        return $this->hasOne(MetaTeg::class, 'code', 'code');
    }
}
