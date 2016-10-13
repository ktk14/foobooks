<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
* Book resource
*/
# index to view all books in BookController after @ is the method/action in controller
Route::get('/books', 'BookController@index')->name('books.index');
# Display form to add a new book
Route::get('/books/create', 'BookController@create')->name('books.create');
# Process form to add a new book
Route::post('/books', 'BookController@store')->name('books.store');
# Display an individual book
Route::get('/books/{title}', 'BookController@show')->name('books.show');
# Display form to edit an individual book
Route::get('/books/{title}/edit', 'BookController@edit')->name('books.edit');
# Process form to save edits to an individual book
Route::put('/books/{title}', 'BookController@update')->name('books.update');
# Delete an individual book
Route::delete('/books/{title}', 'BookController@destroy')->name('books.destroy');

 # can replace all 7 lines with 1 line
 # Route::resource('books', 'BookController');

 /*
 * Misc Pages
 * display simple, static pages don't need own controllers
 */
 Route::get('/help', 'PageController@help')->name('page.help');
 Route::get('/faq', 'PageController@faq')->name('page.faq');

 /*
 * Contact page
 * Single action controller that contains a __invoke method no action is specified
 * This page could also be taken care of via the PageController
 */
 Route::get('/contact', 'ContactController')->name('contact');
/*
* Main homepage
*/
Route::get('/', function () {
    return view('welcome');
});

/*Practice page  A quick and dirty way to set up a whole bunch of practice routes
* that I'll use in lecture. makes 100 localhost/practice/1, practice/2, etc.s*/
Route::get('/practice', 'PracticeController@index')->('practice.index');
for($i = 0; $i < 100; $i++) {
    Route::get('/practice/'.$i, 'PracticeController@example'.$i)->name('practice.example'.$i);
};
