<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Posts;
use App\User;
use Illuminate\Support\Facades\Hash;

Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('post', 'APIController');
});

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    if (Hash::check($request->password, $user->password)) {
        return $user;
    }
    return back()->withErrors([
        'message' => 'Please Check your credentials and try again!'
    ]);
});

Route::get('/', function(){
    return Posts::all();
});*/
