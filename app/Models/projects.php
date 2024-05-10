<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = ["title", 'sub_title', 'img_path'];
    protected $guard = ["information_id"];
}
