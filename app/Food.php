<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
	protected $table = 'tb_food';

	protected $fillable = ['user_id', 'name', 'type', 'price'];
}
