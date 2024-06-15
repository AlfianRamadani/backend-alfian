<?php

namespace App\Models;

use App\Models\Information;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $table = 'social_medias';
    protected $primaryKey = 'id';
    protected $fillable = ["platform", "link", "information_id", "information_id"];
    public function information(){
        return $this->belongsTo(Information::class);
    }
}
