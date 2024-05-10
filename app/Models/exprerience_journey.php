<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exprerience_journey extends Model
{
    use HasFactory;
    protected $table = 'experience_journeys';
    protected $primaryKey = 'id';
    protected $fillable = ["title", 'sub_title', 'period'];
}
