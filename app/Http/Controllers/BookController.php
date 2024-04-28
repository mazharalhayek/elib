<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BookController extends Controller
{

    /**
     * Get all books and return a view according to authenticated user's role
     * @param none
     * @return \Illuminate\Contracts\View\View
     * @return  Book $books
     */
    public function GetAll():\Illuminate\Contracts\View\View
    {
        $books = Book::all();
        
        session()->flash('success', 'You are welcome ❤️');

        return Auth::user()->role_id != 1 ?
        view('bookslist', compact('books')) :
        view('admin.Booksmanage', compact('books'));

    }

    /**
     * Create new book model
     * @param \Illuminate\Http\Request $request
     * @return mixed|string|\Illuminate\Http\RedirectResponse
     */
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

        session()->flash('success', 'Book created successfully');

        return redirect()->back();
    }

    /**
     * Update an existing Book model
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $new = $request->only(['name','desc','price','author']);
        Book::where('id', $request->id)->update($new);

        session()->flash('success', 'Book updated successfully');

        return redirect()->back();
    }

    /**
     * Remove an existing Book model
     * @param mixed $id
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        Book::findOrFail($id)->delete();

        session()->flash('success', 'Book removed successfully');
        return redirect()->back();
    }

    public function GetMyBooks() {
        $user = Auth::user();
        $books = $user->books;
    
        return view('userbooks', compact('books'));
    }

    public function purchase(Request $request, $bookId)
    {
        $user = $request->user(); 
        $book = Book::findOrFail($bookId); 
        $user->books()->syncWithoutDetaching([$bookId]); 
        return redirect()->route('allBooks')->with('success', 'Book purchased successfully!');
    }
    public function showProfile()
    {
        
        $user = Auth::user();
        return view('profile', compact('user'));
    }
    
}
