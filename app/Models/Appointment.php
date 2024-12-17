<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    // protected $table = 'appointments';

    use HasFactory;

    protected $fillable = ['patient_id', 'employee_id', 'date', 'time', 'status', 'is_active', 'comment'];

    protected $casts = [
        'is_active' => 'boolean',
    ];


    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
