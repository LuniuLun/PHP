<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PostsController extends Controller
{
    public function index() {
        //query builders
        // $posts = DB::select("SELECT * FROM posts WHERE id = :id;",[
        //     'id' => 3
        // ]);
        $posts = DB::table("posts")
                    ->where('id', '=', 5)
                    ->delete();
                    // ->update([
                    //     'title' => 'haha title',
                    //     'body' => 'this is haha body'
                    // ]);
                    // ->insert([
                    //     'title' => 'haha',
                    //     'body' => 'A new post hahaha'
                    // ]);
                    // ->where('id', 1)
                    // // ->orWhere('id', '>', 0)                    
                    // ->select('body')
                    // ->get();
        dd($posts);
        //return view('posts.index');
    }
}
