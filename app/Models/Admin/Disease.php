<?php

namespace App\Models\Admin;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
