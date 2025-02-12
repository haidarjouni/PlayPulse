<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SequelPrequel extends Model
{
    protected $table = 'sequels_prequels';
    protected $fillable = ["sequel_type", "sequel_id","prequel_type","prequel_id"];
}
