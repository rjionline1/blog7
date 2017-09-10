<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
	Public function getIndex(){
		$posts = Post::paginate(5);
		return view('blog.index')->withPosts($posts);
	}

    public function getSingle($slug){
    	// fetch from database based on slug
    	$post = Post::where('slug', '=', $slug)->first();

    	// return the view and pass on the post object
    	return view('blog.single')->withPost($post);
    }
}
