<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $table = 'patient';

    protected $fillable = [
        'person_id', 'number', 'medical_file', 'is_active', 'comment'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}