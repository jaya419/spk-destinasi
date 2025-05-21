<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaians';

    protected $fillable = [
        'student_id',
        'criteria_id',
        'value',
    ];

    // Relasi ke tabel students
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Relasi ke tabel criterias
    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
