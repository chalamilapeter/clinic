<?php

namespace App\Models;

use App\Models\Admin\LabTechnician;
use App\Models\Admin\Pharmacist;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function lab_technician()
    {
        return $this->hasOne(LabTechnician::class);
    }

    public function pharmacist()
    {
        return $this->hasOne(Pharmacist::class);
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    public function diagnosis()
    {
        return $this->hasMany(Diagnosis::class);
    }
}
