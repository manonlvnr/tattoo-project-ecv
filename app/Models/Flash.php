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
    public function getUserFlashes()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'name',
        'price',
        'active',
        'color',
        'tattooist_id',
        'category_flashes_id'
    ];

}
