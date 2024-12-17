<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    // yo! I'm a comment
    use HasFactory;

    // protected $table = 'employees';

    protected $fillable = [
        'person_id',
        'user_id',
        'name',
        'number',
        'email',
        'employee_type',
        'specialization',
        'availability',
        'date_of_birth',
        'is_active',
        'comment'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function getFullNameAttribute()
    {
        return isset($this->person) ? $this->person->first_name . ' ' . $this->person->last_name : 'N/A';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($employee) {
            do {
                $randomNumber = mt_rand(100000, 999999); // Genereer een nummer met 6 cijfers
            } while (self::where('number', $randomNumber)->exists()); // Controleer uniekheid

            $employee->number = $randomNumber; // Stel het nummer in
        });
    }
}
