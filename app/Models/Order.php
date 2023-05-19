<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function relatedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function relatedPet()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }

    public function relatedDoctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function relatedService()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
