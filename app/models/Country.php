<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // public $with = ['counties'];
    protected $table = 'country';
    protected $fillable = [
        'code', 'name', 'flag',
    ];
    public $timestamps = false;

    public function counties()
    {
        return $this->hasMany(County::class);
    }
}

