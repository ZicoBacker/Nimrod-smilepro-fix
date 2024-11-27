<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'first_name',
        'infix',
        'last_name',
        'date_of_birth',
        'is_active',
        'comment'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->infix} {$this->last_name}";
    }
}
