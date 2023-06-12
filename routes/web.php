<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
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

//Route - cach cu xu voi duong dan url

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function (){
   dd("Day la trang chu");
});

Route::get('/login', function (){
    $name = "Nghia";
    return view('login', compact('name'));
});

Route::get('/users', [UserController::class,"index"])->name('user.index');
Route::get('/users/{id}/detail', [UserController::class,"show"])->name('user.detail');

Route::get('/users/create',function (){
    return view('user.create');
})->name('user.create');

Route::post('/users/create',function (Request $request){
    $user = User::create([
        'name' => $request->username,
        'email' => $request->email,
        'password' => $request->password,
    ]);
    $user->save();
    return redirect()->route('user.index');
})->name('user.formCreate');

Route::get('users/{id}/delete',function ($id){
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->back();
})->name('user.delete');

Route::get('/users/{id}/update',function ($id){
    $user = User::findOrFail($id);
    return view('user.update',compact('user'));
})->name('user.formUpdate');

Route::post('/users/{id}/update',function (Request $request, $id){
    $user = User::findOrFail($id);
    $user->update([
        'name' => $request->username,
        'email' => $request->email,
        'password' => $request->password,
    ]);
    $user->save();
    return redirect()->route('user.index');
})->name('user.update');
