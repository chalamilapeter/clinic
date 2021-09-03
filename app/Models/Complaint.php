<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function doctor()
    {
     return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function diagnosis()
    {
        return $this->hasOne(Diagnosis::class);
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
