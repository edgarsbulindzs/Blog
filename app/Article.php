<?php

namespace App;
use App\users;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    // Table Name
    protected $table = 'articles';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = ['cover_images'];
    public function user(){
        return $this->belongsTo('App\users');
    }
}
