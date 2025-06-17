<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipsImage extends Model
{
    use HasFactory;

    protected $table = 'tips_images';

    protected $fillable = [
        'title',
        'image_path',
    ];
}
