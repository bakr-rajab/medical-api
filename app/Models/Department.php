<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=['name'];
    public function doctors(){
        return $this->belongsToMany(Doctor::class,'department_doctor');
    }
}
