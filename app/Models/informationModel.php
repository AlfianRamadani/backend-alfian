<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informationModel extends Model
{
    use HasFactory;
    protected $table = 'information';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'position', 'projects_done', 'impression', 'clients_satisfication', 'country'];
    
    public function projects(){
        return $this->hasMany(projects::class, 'information_id');
    }
}
