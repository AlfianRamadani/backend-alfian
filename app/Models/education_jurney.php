<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class education_journey extends Model
{
    use HasFactory;
    protected $table = 'education_jurneys';
    protected $primaryKey = 'id';
    protected $fillable = ["title", 'sub_title', 'period'];
}
