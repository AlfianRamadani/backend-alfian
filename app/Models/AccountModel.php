<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    use HasFactory;
    protected $table = 'account';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password'];
    
    
}
