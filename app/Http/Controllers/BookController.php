<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function GetAll()
    {    
        $books = Book::all();

       
        return Auth::user()->role_id != 1 ? 
        view('bookslist', compact('books')) :
        view('admin.Booksmanage', compact('books'));
    
    }

    public function create(Request $request)
    {
        if (Auth::user()->role_id != 1) {return "unauthorized!!";}
        
        $validated = $request->validate([
            'name'=>['string','required','min:3','max:150'],
            'price'=>['integer','required','min:0'],
            'author'=>['string','required','min:5','max:50'],
            'desc'=>['string','required','max:150'],
        ]);
        $book = Book::create($validated);
        return redirect()->back();  
    }

    public function update(Request $request)
    {
        $new = $request->only(['name','desc','price','author']);
        Book::where('id', $request->id)->update($new);
        return redirect()->back();
    }

    public function remove($id)
    {
        Book::findOrFail($id)->delete();
        return redirect()->back();
    }
}
