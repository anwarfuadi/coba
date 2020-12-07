<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    public function emps(){
        return $this->hasMany(Emp::class);
    }
}
