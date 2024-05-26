<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    use HasFactory;
    protected $table = 'journeys';
    protected $primaryKey = 'id';
    protected $fillable = ["work", 'division', 'period', 'information_id'];
    public function information()
    {
        return $this->belongsTo(Information::class);
    }
}
