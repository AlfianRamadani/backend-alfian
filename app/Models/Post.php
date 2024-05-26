<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";

    protected $fillable = [
        "title",
        "content",
        "featured_image",
        "information_id"
    ];

    protected $guard = [
        "id"
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function information(){
        return $this->belongsTo(information::class, "information_id");
    }
    public function categories(){
        return $this->belongsToMany(Category::class, "post_categories", "post_id", "category_id");
    }
    
}
