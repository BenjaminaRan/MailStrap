<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
 
    protected $table = "crud";
    use HasFactory;
    protected $fillable = [
        'nom',
        'devise',
        'email',
    ];
}
