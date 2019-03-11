<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class FoodServices extends Controller
{
    public function newFood()
    {
    	return new Food;
    }

    public function all()
    {
    	return $this->newFood()->all();
    }

    public function find($id)
    {
    	return $this->newFood()->findOrFail($id);
    }

    public function create($request)
    {
    	return $this->newFood()->create($request);
    }

    public function update($request, $id)
    {
    	return $this->newFood()->find($id)->update($request);
    }

    public function delete($id)
    {
    	return $this->newFood()->find($id)->dalete();
    }
}
