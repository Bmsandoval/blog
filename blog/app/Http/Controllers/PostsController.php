<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

//use Illuminate\Http\Request;
use Request;
use Session;
use App\Post;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $posts = Post::all();
        return view('posts.list',[
            'posts' => $posts->where('public',true)->where('status_id',Post::current),
            'stash'=>false,
        ]);
    }

    public function stash()
    {
        $posts = Post::all();
        return view('posts.list',[
            'posts' => $posts->where('owner_id',Auth::user()->id)->where('status_id',Post::drafted),
            'stash' => true,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Request::get('submit')=='publish') {
            $this->validate(request(), [
                'title' => 'required|string',
                'body' => 'required|string',
                'synopsis' => 'required|string',
            ]);
            $post = new Post;

            $post->title = request('title');
            $post->description = request('synopsis');
            $post->article = request('body');
            $post->status_id = Post::current;
            $post->user_id = Auth::user()->id;
            $post->public = true;

            $post->save();

            return redirect('/posts/' . $post->id);
        }
        else if (Request::get('submit')=='stash'){
            $this->validate(request(), [
                'title' => 'required|string',
                'body' => 'required|string',
            ]);
            $post = new Post;

            $post->title = request('title');
            $post->description = request('synopsis');
            $post->article = request('body');
            $post->status_id = Post::drafted;
            $post->user_id = Auth::user()->id;
            $post->public = false;

            $post->save();

            return redirect('/posts');

        }
        else if (Request::get('submit')=='discard'){
            return redirect('/posts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if( ($post->status_id == Post::current) || (Auth::check() && $post->owner_id == Auth::user()->id && $post->status_id == Post::drafted)){
            return view('posts.show', [
                'post' => $post,
            ]);
        }
        return view('posts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',[
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $post = Post::find($id);
        $wasPublic = $post->public;
        $post->public = false;
        if(Request::get('submit')=='publish') {
            $this->validate(request(), [
                'title' => 'required|string',
                'body' => 'required|string',
                'synopsis' => 'required|string',
            ]);


            $post->status_id=Post::updated;
            $post->save();

            $post = new Post();
            $post->title = request('title');
            $post->description = request('synopsis');
            $post->article = request('body');
            $post->status_id=Post::current;
            $post->public=$wasPublic;
            $post->save();
            return Redirect::to('/posts/' . $post->id);
        } else if(Request::get('submit')=='delete'){
            $post->status_id=Post::removed;
            $post->save();
            return Redirect::to('/posts');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO: Uncomment this once user authorization is enabled

/*        $post = Post::find($id);
        $post->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::to('/posts');*/

    }
}
