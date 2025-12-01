<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $aboutPageUrl = route('about');
    $productViewUrl = route('product.view', ['lang' => 'en', 'id' => 1234]);
    dd($productViewUrl);
    return view('welcome');
});

Route::view('/about', 'about')->name('about');


Route::get('/product/{id}', function(string $id) {
    
    return "Product ID: " . $id;
})->whereNumber('id');


// Route::get("/product/{category?}", function(string $category = null) {
//     return "Product for category=$category";
// });

// Custom Parameter Constraint Example

Route::get('/user/{username}', function(string $username) {

})->where('username', '[a-z]+');

Route::get('{lang}/product/{id}', function(string $lang, string $id) {
    return "Language: " . $lang . ", Product ID: " . $id;
})->where(['lang' => '[a-z]{2}', 'id' => '\d{4,}'])->name('product.view');

Route::get('/search/{query}', function(string $query) {
    return "Search Query: " . $query;
})->where('query', '.*');