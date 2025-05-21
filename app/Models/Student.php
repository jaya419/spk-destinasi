<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'class',
    ];

public function scores() {
    return $this->hasMany(Penilaian::class);
}

}
