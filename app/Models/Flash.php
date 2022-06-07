<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Flash extends Model
{
    use HasFactory;

    public function pictureFile()
    {
        return $this->hasOne(PictureFile::class);
    }

    public function tattooist()
    {
        return $this->belongsTo(User::class);
    }
}
