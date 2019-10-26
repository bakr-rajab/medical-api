<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'full_name','user_id','phone'
    ];

    public function departments()
    {
        return $this->belongsToMany(Department::class,'department_doctor');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
