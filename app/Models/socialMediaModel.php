<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaModel extends Model
{
    use HasFactory;
    protected $table = 'social_media';
    protected $primaryKey = 'id';
    protected $fillable = ["linkedin", 'discord', 'twitter', 'instagram', 'facebook'];
}
