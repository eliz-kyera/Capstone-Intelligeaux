<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'sle_id',
        'purpose',
        'venue',
        'date',
        'description',
        'approved',
    ];

    public function sle()
    {
        $this->belongsTo(Sle::class, 'sle_id');
    }
}
