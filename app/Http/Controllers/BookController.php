<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        $search = $request->input('search');
    
        $books = Book::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('author', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(10);
            return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(BookRequest $request)
    {
        $data = $request->validated();
        if ( $book= Book::create($data)) {
            return redirect()->route('book.list')->with('success_message', __('Book was successfully added.'));
        }
        return back()->withInput()->with('error_message', __('Unexpected error occurred while trying to process your request.')); 
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show',compact('book'));
    
    }

    public function bookDetails(Book $book)
    {
        return view('books.book_details',compact('book'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();
        if ($book->update($data)) {
            return redirect()->route('book.list')->with('success_message', __('Book was successfully updated.'));
        }
        return back()->withInput()->with('error_message', __('Unexpected error occurred while trying to process your request.'));
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
    if ($book->delete()) {
        return redirect()->route('book.list')->with('success_message', __('Book was successfully deleted.'));
    }
    return back()->withInput()->with('error_message', __('Unexpected error occurred while trying to process your request.'));  
    }
}
