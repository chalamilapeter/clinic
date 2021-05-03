<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function pharmacists()
    {
        return $this->hasMany(Pharmacist::class);
    }
}
