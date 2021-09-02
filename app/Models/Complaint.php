<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function user()
    {
     return $this->belongsTo(User::class);
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
