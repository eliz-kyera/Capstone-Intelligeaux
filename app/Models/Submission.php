<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'report_id',
        'file_name'
    ];

    public function report()
    {
       return $this->belongsTo(Report::class, 'report_id' );
    }
}