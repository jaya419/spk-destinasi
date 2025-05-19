<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
    ];

    public function scores()
    {
        return $this->hasMany(Recomendasi::class, 'destination_id');
    }
}
