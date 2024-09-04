<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Setting extends Model
{
    use HasFactory, RevisionableTrait;

    protected $fillable = [
        'name',
        'code',
        'value',
        'type',
        'active',
    ];

    static function tariffs()
    {
        return self::where(['active'=>1,'type'=>4])->pluck('name','id')->toArray();
    }
}
