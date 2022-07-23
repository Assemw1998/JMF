<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycles extends Model
{
    use HasFactory;

    public function make()
    {
        return $this->hasOne('App\Models\Makes');
    }

    public function model()
    {
        return $this->hasOne('App\Models\Models');
    }

    public function color()
    {
        return $this->hasMany('App\Models\Colors');
    }

    public function cylinder()
    {
        return $this->hasOne('App\Models\Cylinders');
    }
    
}
