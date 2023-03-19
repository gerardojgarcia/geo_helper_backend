<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/upload', function (Request $request) {
    $file = $request->file('image');
    $filename = $file->getClientOriginalName();
    $path = $file->store('public/images');

    $image = new App\Models\Image;
    $image->filename = $filename;
    $image->path = $path;
    $image->save();

    return response()->json([
        'message' => 'Image uploaded successfully!',
        'image' => $image,
    ]);
});

