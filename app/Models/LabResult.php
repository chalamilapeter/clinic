<?php

namespace App\Models;

use App\Models\Admin\LabTechnician;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabResult extends Model
{
    use HasFactory;

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class);
    }

    public function lab_technician()
    {
        return $this->belongsTo(LabTechnician::class);
    }
}
