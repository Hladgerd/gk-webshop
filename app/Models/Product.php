<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        '3_pcs_disc',
        '5_pcs_disc'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
