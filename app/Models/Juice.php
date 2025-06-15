<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    // Cast price to integer
    protected $casts = [
        'price' => 'integer',
    ];

    // Helper to display price as "shs.3500" or dash if null
    public function getPriceDisplayAttribute(): string
    {
        return $this->price !== null
            ? 'shs.' . number_format($this->price, 0, '', '')
            : '—';
    }
}
