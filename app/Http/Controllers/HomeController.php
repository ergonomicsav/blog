<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//        dd(__METHOD__);
        $posts = Post::paginate(3);
//        $popularPost = Post::orderBy('views', 'desc')->take(3)->pluck('id')->all();
        $popularPost = Post::orderBy('views', 'desc')->take(3)->get();
        $featuredPost = Post::where('is_featured', 1)->take(3)->get();
        $recentPost = Post::orderBy('date', 'desc')->take(4)->get();
        $categories = Category::all();
        return view('pages.index', compact('posts', 'popularPost', 'featuredPost', 'recentPost', 'categories'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('post'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->where('status', 1)->paginate(2);
        return view('pages.list', compact('posts'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->where('status', 1)->paginate(2);
        return view('pages.list', compact('posts'));
    }
}
