<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create varable and store all posts in it
        $posts = Post::orderBy('id','desc')->paginate(5);

        // return a view and pass in variable values
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, [
            'title'         => 'required|max:255',
            'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'   => 'required|integer',
            'body'          => 'required',
            'featured_image'=> 'sometimes|image'
            ]);

        // store in database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The blog post was successfully saved!');

        // redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save it as a variable
        $post = Post::find($id);
        $tags = Tag::all();
        $categories = Category::all();
        

        $tagx = array();
        foreach ($tags as $tag) {
            $tagx[$tag -> id] = $tag->name;
        }

        $cats = array();
        foreach ($categories as $category) {
            $cats[$category -> id] = $category->name;
        }

        // return the view passing in the variable
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tagx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the form data
        
        $post = Post::find($id);

        if ($request->input('slug') == $post->slug) {
            $this->validate($request, [
            'title' => 'required|max:255',
            'category_id'   => 'required|integer',
            'body' => 'required',
            'featured_image' => 'image'
            ]);

        } else {

        $this->validate($request, [
            'title'         => 'required|max:255',
            'category_id'   => 'required|integer',
            'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body'          => 'required',
            'featured_image'=> 'image'
            ]);
        }

        // save the data to the database
        $post = Post::find($id);

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = $request->slug;
        $post->body = Purifier::clean($request->body);

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $oldFilename = $post->image;

            $post->image = $filename;

            Storage::delete($oldFilename); 
        }

        $post->save();

        $post->tags()->sync($request->tags);

        // set flash data success message
        Session::flash('success', 'The blog post was successfully updated!');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->tags()->detach();

        Storage::delete($post->image);
        $post->delete();
        Session::flash('success', 'The post has been successfully deleted.');

        return redirect()->route('posts.index');


    }
}
