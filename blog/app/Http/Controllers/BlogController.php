<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Blog;
use Illuminate\Http\Request;
use App\User;

class BlogController extends Controller
{
    public function index(){
        $posts = Blog::orderBy('id','desc')->paginate(5);
        $new = Blog::orderBy('id', 'desc')->limit(3)->get();
        return view('blogs.index',compact('posts','new'));
    }

    public function show($id){
        $post = Blog::find($id);
        return view('blogs.detail',compact('post'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/blogs');
    }

    public function addPost(Request $request){
        $id = Auth::user()->id;
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->content = $request->editor1;
        $blog->user_id = $id;
        $blog->save();
        return redirect('/blogs');
    }

    public function search(Request $request)

    {

        $keyword = $request->input('keyword');
        if (!$keyword) {

            return redirect()->route('blogs.index');
        }

        $posts = Blog::where('title', 'LIKE', '%' . $keyword . '%')

            ->paginate(5);
            // dd($posts->total());
        $countSearch = $posts->total();
        return view('blogs.index', compact('posts','countSearch'));
    }

    public function create(){
        return view('ckediter');
    }
}
