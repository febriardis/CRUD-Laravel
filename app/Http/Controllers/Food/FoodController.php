<?php

namespace App\Http\Controllers\Food;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FoodServices;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
	function __construct()
	{
		return $this->newFood = new FoodServices;
	}

    public function index()
    {
    	$foods = $this->newFood->all();
    	return view('food.index', compact('foods', $foods));
    }

    public function create()
    {
    	return view('food.create');
    }

    public function insert(Request $req)
    {
    	$this->newFood->create([
    		'user_id' => Auth::user()->id,
    		'name'	   => $req->name,
    		'type'	   => $req->type,
    		'price'    => $req->price
    	]);

    	return redirect()->route('food.index');
    }
}
