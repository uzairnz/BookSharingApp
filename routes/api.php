<?php

use Illuminate\Http\Request;
Use App\Books;


Route::get('books', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Books::all();
});

Route::get('books/{id}', function($id) {
    return Books::find($id);
});

Route::post('books', function(Request $request) {    //note there is no {id} in function
    return Books::create($request->all);        //$request->all() instead it is $request->all
});

Route::put('books/{id}', function(Request $request, $id) {
    $article = Books::findOrFail($id);
    $article->update($request->all());

    return $article;
});

Route::delete('books/{id}', function($id) {
    Books::find($id)->delete();

    return 204;
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Book', 'prefix' => 'BooksController@index'], function (){
   Route::get('/', ['as' => 'books', 'uses' => 'BooksController@index']);
   Route::put('/', ['as' => 'books', 'uses' => 'BooksController@index']);
   Route::get('/{books}', ['as' => 'books.show', 'uses' => 'BooksController@show']);

});
