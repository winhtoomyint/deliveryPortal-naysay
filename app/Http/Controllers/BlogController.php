<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function blog()
    {
        $posts = \App\Models\Post::query()
            ->where('publish', '=', 1)
            ->paginate(3);
       //dd($posts);
        return view('Blog.blog', compact('posts'));
    }
    public function blogdetail(Request $request)
    {
        if (count($request->all()) == 0) {
            $postid = session()->get('postid');
        } else {
            $request->session()->put('postid', $request->postid);
            $postid = $request->session()->get('postid');
        }
        $posts = \App\Models\Post::find($postid);
        $recentposts = DB::select('select * from posts ORDER BY id DESC LIMIT 5');
        $comments = \App\Models\Post::find($postid)->comments;
        //$comments = App\Models\Post::find(1)->comments;
        //dd($comments);
        
        $categories = Category::withCount('posts')->get();

        return view('Blog.blogdetail')->with([
            'posts' => $posts,
            'categories' => $categories,
            'comments' => $comments,
            'recentposts' => $recentposts,
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $comment = new Comment();
        $comment->post_id = $request->postid;
        $comment->user_id = $request->userid;
        $comment->comment = $request->comment;

        $comment->save();
        //$comments = \App\Models\Comment::find($request->postid);
        $comments = \App\Models\Post::find($request->postid)->comments;
        //dd($comments);
        $posts = \App\Models\Post::find($request->postid);
        $recentposts = DB::select('select * from posts ORDER BY id DESC LIMIT 5');
       // $categories = DB::select('select * from categories');
       $categories = Category::withCount('posts')->get();
        return redirect()->route('blogdetail')->with([
            'posts' => $posts,
            'categories' => $categories,
            'comments' => $comments,
            'recentposts' => $recentposts,
        ]);
    }
}
