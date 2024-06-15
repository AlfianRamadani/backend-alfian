<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $table = 'informations';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'position','description_1','description_2', 'description_3','description_4','position','email','contact_person', 'country', 'projects_done', 'satisfication', 'experience','avatar', ];
    protected static function boot()
    {
        parent::boot();

        static::retrieved(function ($information) {
            $information->avatar = asset($information->avatar);
        });
    }    public function project(){
        return $this->hasMany(Project::class, "information_id");
    }
    public function journey(){
        return $this->hasMany(Journey::class, "information_id");
    }
    public function education(){
        return $this->hasMany(Education::class, "information_id");
    }
    
    public function socialMedia(){
        return $this->hasMany(SocialMedia::class, "information_id");
    }
    
    

}
