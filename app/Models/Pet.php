<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function relatedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function relatedCreatedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
