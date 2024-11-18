<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    protected $table = 'characters';
    protected $fillable = ['name','gender','profile_image','height','age'];

    public function gender($value){
        $value ? 'Male' : 'Female';
    }
}
