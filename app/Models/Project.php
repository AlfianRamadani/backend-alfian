<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = ["title", 'sub_title', 'img_path', "information_id"];

    public function information(){
        return $this->belongsTo(Information::class);
    }
    
}
