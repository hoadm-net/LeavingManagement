<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaving extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'position',
        'shift',
        'department_id',
        'leave_days',
        'from',
        'to',
        'paid_leave',
        'reason_company_pay',
        'child_under_12',
        'self_marriage',
        'child_marriage',
        'grand_funeral',
        'parent_funeral',
        'pregnancy_check',
        'maternity_leave',
        'paternity_leave',
        'other_insurance_leave',
        'reason_insurance',
        'sick_leave',
        'child_sick_leave',
        'unpaid_reason',
        'emergency_contact',
        'current_manager',
        'file_name'
    ];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function logs() {
        return $this->hasMany(Log::class, 'leaving_id', 'id');
    }

    public function lastLog() {
        return $this->hasOne(Log::class, 'leaving_id', 'id')->latest('created_at');
    }

    public function lastNote() {
        return $this->hasOne(HNote::class, 'leaving_id', 'id')->latest('created_at');
    }
}
