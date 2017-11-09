<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Article;
class users extends Model
{
protected $table = 'users';



protected $fillable = ['username','password','country','city','first_name','last_name'];

protected $hidden = ['password','remember_token'];

    public function articles(){
        return $this->hasMany('App\Article');
    }
}
