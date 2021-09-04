<?php

namespace App\Models\Admin;

use App\Models\LabResult;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTechnician extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lab_results()
    {
        return $this->hasMany(LabResult::class);
    }

}
