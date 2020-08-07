<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use Illuminate\Http\Request;

use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('verifyCategoriesCount')->only(['create','store']);    
     }
    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        
        $image =$request->image->store('posts');
        
        $post = Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'image'=>$image,
            'published_at'=>$request->published_at,
            'category_id'=>$request->category

        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        session()->flash('success',"Post created successfully");

        return redirect(route('posts.index'));

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post )
    {
        $date= $request->only(['title','description','content']);
        //check if new image
        if($request->hasFile('image')){
            $image=$request->image->store('posts');
            $post->deleteImage();
            $date['image'] = $image;
        }

        if($request->tags){
            $post->tags()->sync($request->tags);
        }

        //update  attribute
        $post->update($date);

        session()->flash('success','Post updated successfully');
        return redirect(route('posts.index')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::withTrashed()->where('id',$id)->firstOrFail();
        if($post->trashed()) 
        {
            $post->deleteImage();
            $post->forceDelete();
        } else{
            $post->delete();
        }
        
        session()->flash('success',"Post deleted succesfully");
        return redirect(route('posts.index'));
    }


     /**
     * Display all trashed post 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed= Post::onlyTrashed()->get();
        return view('posts.index')->withposts($trashed);

    }

    public function restore($id)
    {
        $post=Post::withTrashed()->where('id',$id)->firstOrFail();
         $post->restore();
        session()->flash('success','Post restored succesfully');
        return redirect()->back();
    }
}
