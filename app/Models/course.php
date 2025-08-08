<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    public function courseMaterials()
    {
        return $this->hasMany(courses_material::class);
    }
}
