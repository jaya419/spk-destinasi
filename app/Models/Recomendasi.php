<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recomendasi extends Model
{
    protected $fillable = ['destination_id', 'criteria_id', 'value'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
