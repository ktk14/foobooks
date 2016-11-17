<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;
use Session;

class BookController extends Controller
{

    /**
	* GET
	*/
    public function index()
    {
        $books = Book::all();
        return view('book.index')->with(['books' => $books]);
    }

    /**
	* GET
	*/
    public function create()
    {
        return view('book.create');
    }

    /**
	* POST
	*/
    public function store(Request $request)
    {

        # Validate
        $this->validate($request, [
            'title' => 'required|min:3',
            'published' => 'required|min:4|numeric',
            'cover' => 'required|url',
            'purchase_link' => 'required|url',
        ]);

        # If there were errors, Laravel will redirect the
        # user back to the page that submitted this request
        # The validator will tack on the form data to the request
        # so that it's possible (but not required) to pre-fill the
        # form fields with the data the user had entered

        # If there were NO errors, the script will continue...

        # Get the data from the form
        #$title = $_POST['title']; # Option 1) Old way, don't do this.
        $title = $request->input('title'); # Option 2) USE THIS ONE! :)

        $book = new Book();
        $book->title = $request->input('title');
        $book->published = $request->input('published');
        $book->cover = $request->input('cover');
        $book->purchase_link = $request->input('purchase_link');
        $book->save();

        Session::flash('flash_message', 'Your book '.$book->title.' was added.');

        return redirect('/books');

    }


    /**
	* GET
	*/
    public function show($id)
    {
        return view('book.show')->with('title', $id);
    }


    /**
	* GET
	*/
    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit')->with(['book' => $book]);
    }


    /**
	* POST
	*/
    public function update(Request $request, $id)
    {

        # Validate
        $this->validate($request, [
            'title' => 'required|min:3',
            'published' => 'required|min:4|numeric',
            'cover' => 'required|url',
            'purchase_link' => 'required|url',
        ]);

        # Find and update book
        $book = Book::find($request->id);
        $book->title = $request->title;
        $book->cover = $request->cover;
        $book->published = $request->published;
        $book->purchase_link = $request->purchase_link;
        $book->save();

        # Finish
        Session::flash('flash_message', 'Your changes to '.$book->title.' were saved.');
        return redirect('/books');
    }

    /**
	*
	*/
    public function destroy($id)
    {
        //
    }

}
