<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['teacher_id','Fname','Lname','email','address','class'];


   
}
