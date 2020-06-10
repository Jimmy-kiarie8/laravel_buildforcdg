<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'code', 'type', 'level', 'ward_id', 'non_curriculum_activities'
    ];
}
