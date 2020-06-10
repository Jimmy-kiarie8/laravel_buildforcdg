<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Constituecy extends Model
{
    public $with = ['county'];
    protected $table = 'constituency';
    protected $fillable = [
        'name', 'county_id',
    ];
    public $timestamps = false;

    public function county()
    {
        return $this->belongsTo(County::class);
    }
}
