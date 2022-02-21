<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $response = Http::get('https://api.imgflip.com/get_memes');
    $memes = $response->json()['data']['memes'];
    return view('index', compact('memes'));
});

Route::get('/create', function () {
    $id = $_GET['id'];
    $img = $_GET['img'];
    return view('create', compact('id', 'img'));
});


Route::post('/generate', function() {
    $response = Http::asForm()->post('https://api.imgflip.com/caption_image', [
        'template_id' => request('template_id'),
        'username' => request('username'),
        'password' => request('password'),
        'text0' => request('text0'),
        'text1' => request('text1'),
    ]);
    // return $response;
    return view('show', [
        'url' => $response->json()['data']['url'],
    ]);
});

Route::get('/download', function () {
    $img = $_GET['img'];
    $header = ['Content-Type: image/jpeg'];

    $filename = time().'.jpg';
    Storage::disk('local')->put($filename, file_get_contents($img));
    return response()->download(storage_path('app/' . $img), 'meme.jpg', $header);
    // return $save_storage;
})->name('download');
