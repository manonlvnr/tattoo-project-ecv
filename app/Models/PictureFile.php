<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PictureFile extends Model
{
    use HasFactory;


    // In Gallery model
    public function flash()
    {
        return $this->belongsTo(Flash::class);
    }
}
