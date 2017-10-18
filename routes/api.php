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
    Route::get('post', 'APIController@index');
    Route::post('login', function (Request $request){
        $user = User::where('email', $request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            return response()->json(['msg'=>'Successfully Login','status'=>'success','user'=>$user]);
        }
        return response()->json(['msg'=>'Please Check your credentials and try again!','status'=>'fail']);
    });
    Route::post('post', 'APIController@store');
    Route::get('post/{post}', 'APIController@show');
    Route::post('post/comment', 'APIController@storecomment');

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
