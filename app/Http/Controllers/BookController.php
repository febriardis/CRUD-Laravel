<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;

class BookController extends Controller
{

    public function index(){
    	$books = Book::all();
    	return view('book.index', compact('books',$books));
    	//->with('books', $books);
    }

    public function create(){
    	return view('book.create');
    }

    public function insert(Request $req){
    	$this->validate($req, [
    		'author' => 'required',
    		'title'  => 'required',
    		'year'   => 'required',
    	]);

    	$books = new Book;
    	$books->create([
    		'user_id'=> Auth::user()->id,
    		'author' => $req->author,
    		'title'  => $req->title,
    		'year'	 => $req->year,
    	]);

    	return redirect()->route('book.index');
    }

    public function edit($id){
    	$book = Book::find($id);

    	return view('book.edit', compact('book', $book));
    }

    public function update(Request $req, $id){
       	$this->validate($req, [
    		'author' => 'required',
    		'title'  => 'required',
    		'year'   => 'required',
    	]);

    	$books = Book::find($id);
    	$books->update([
    		'user_id'=> Auth::user()->id,
    		'author' => $req->author,
    		'title'  => $req->title,
    		'year'	 => $req->year,
    	]);

    	return redirect()->route('book.index');	
    }

    public function delete($id) {
   		Book::find($id)->delete();

   		return redirect()->back();
    }
}
