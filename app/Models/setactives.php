<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Information;

class setactives extends Model
{
    use HasFactory;

    protected $table = 'setactives';
    protected $primaryKey = 'id';
    protected $fillable = ['information_id'];
    
    public function Information(){
        return $this->belongsTo(Information::class);
    }
    
}
