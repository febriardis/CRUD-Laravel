<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'tb_book';

    protected $fillable = ['user_id','author', 'title', 'year'];

    function User(){
    	return $this->belongsTo(User::class);
    }
}
