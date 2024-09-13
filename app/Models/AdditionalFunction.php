<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdditionalFunction extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'text','price'];

    public function parcels()
    {
        return $this->belongsToMany(Parcel::class, 'parcel_additional_function', 'parcel_id', 'additional_function_id');
    }
}
