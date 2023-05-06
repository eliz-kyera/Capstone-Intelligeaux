<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'sle_id',
        'title', 
        'image', 
        'description',
        'latitude',
        'longitude',
        'status',

    ];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function sle(){
        return $this->belongsTo(Sle::class, 'sle_id');
    }

    public function submission()
    {
        return $this->hasOne(Submission::class);
    }

}