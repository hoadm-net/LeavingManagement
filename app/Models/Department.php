<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'max_level', 'description'];

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'user_department',
            'department_id',
            'user_id')->withPivot('level');
    }

    public function isValid() {
        $required_levels = [];
        for($i = 1; $i <= $this->max_level; $i++) {
            $required_levels[] = $i;
        }

        foreach($this->users as $u) {

            $key = array_search($u->pivot->level, $required_levels); // Tìm key của phần tử
            if ($key !== false) {
                unset($required_levels[$key]);
            }
        }

        return count($required_levels) == 0;
    }

}
