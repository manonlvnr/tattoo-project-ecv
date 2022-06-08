<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function tattooist()
    {
        return $this->hasOne(User::class, 'tattooist_id');
    }
}
