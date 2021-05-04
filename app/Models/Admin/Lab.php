<?php

namespace App\Models\Admin;

use App\Models\Diagnosis;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function lab_technician()
    {
        return $this->hasMany(LabTechnician::class);
    }

    public function diagnosis()
    {
        return $this->hasMany(Diagnosis::class);
    }
}
