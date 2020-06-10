<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    public $with = ['country'];
    protected $table = 'county';
    protected $fillable = [
        'code', 'name', 'country_id',
    ];
    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function constituencies()
    {
        return $this->hasMany(Constituecy::class);
    }
}
