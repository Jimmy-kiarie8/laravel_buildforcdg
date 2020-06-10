<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    // public $with = ['statistics'];
    protected $fillable = ['school', 'course', 'no_of_female', 'no_of_male', 'student_population', 'min_age', 'max_age', 'no_of_disabled_students', 'school_fees', 'book_per_student', 'no_of_teachers', 'average_performance', 'no_of_dropouts', 'description', 'year',];
    public $timestamps = false;

    // public function country()
    // {
    //     return $this->belongsTo(Country::class);
    // }
    // public function constituencies()
    // {
    //     return $this->hasMany(Constituecy::class);
    // }
}
