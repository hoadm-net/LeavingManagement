<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'ticket_approval_history';
    protected $fillable = ['leaving_id', 'user_id', 'action', 'notes'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
