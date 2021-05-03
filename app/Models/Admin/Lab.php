<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function lab_technicians()
    {
        return $this->hasMany(LabTechnician::class);
    }
}
