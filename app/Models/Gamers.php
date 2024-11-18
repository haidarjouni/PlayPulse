<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamers extends Model
{
    protected $table = 'gamers';
    use HasFactory;
    protected $fillable = ["name","password","email"];
}
