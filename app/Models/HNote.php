<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HNote extends Model
{
    use HasFactory;
    protected $table = 'hr_notes';

    protected $fillable = [
        'leaving_id',
        'user_id',
        'year',
        'total_days',
        'used_days',
        'remaining_days',
        'notes'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
