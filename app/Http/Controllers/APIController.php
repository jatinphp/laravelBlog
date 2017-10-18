<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use Carbon\Carbon;
use App\Comments;
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
    public function show($post)
    {
    	$postg = Posts::find($post);
    	$comme = $postg->commentsa->load('users');
    	$puser = $postg->users;
    	
    	return response()->json(['post'=>$postg]);
	}
	public function storecomment(Request $request)
	{
		Comments::create([
            'posts_id' => $request->post,
            'users_id' => $request->users_id,
            'body'=> $request->body
        ]);
		return response()->json(['msg'=>'Successfully Login','status'=>'success']);
	}
}
