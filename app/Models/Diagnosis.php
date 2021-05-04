<?php

namespace App\Models;

use App\Models\Admin\Lab;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
