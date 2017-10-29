<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
protected $table = 'users';

public $fillable = ['username','password','country','city','first_name','last_name'];

protected $hidden = ['password','remember_token'];

}
