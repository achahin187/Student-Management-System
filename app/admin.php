<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class admin extends Authenticatable
{
    protected $guarded = [''];
}