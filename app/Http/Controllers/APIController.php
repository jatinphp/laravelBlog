<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
class APIController extends Controller
{
    public function index()
    {
        $posts = Posts::all();
        return response()->json($posts);
    }
}
