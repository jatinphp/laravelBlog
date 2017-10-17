<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
class APIController extends Controller
{
    public function index()
    {
        $posts = Posts::latest()
            ->filter(request(['month','year']))
            ->with('users')
            ->get();

        return response()->json($posts);
    }
    public function store(Request $request)
    {
    	Posts::create($request->except('_token', 'api_token'));
    	return response()->json(['msg'=>'Successfully Login','status'=>'success']);
    }
    public function show($id)
    {
    	return response()->json(Posts::with('users')->with('commentsa')->find($id));
	}
}
