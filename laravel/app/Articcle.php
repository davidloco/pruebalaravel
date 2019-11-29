<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'name', 
        'image', 
        'description',
        'user_id',
        'category_id'
    ];

    public funtion user(){
    	return $this->belongsTo('App\User');
    }

    public funtion category(){
    	return $this->belongsTo('App\User');
    }
}
