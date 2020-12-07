<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emp extends Model
{
    public function pos(){
       return $this->belongsTo(Pos::class);
    }
}
