<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

//use Illuminate\Http\Request;
use Request;
use Session;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',[
            'posts' => $posts->where('visible',true),
            'first_post' => Post::first()->get()[0],
            'last_post' => Post::last()->get()[0],
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
        $this->validate(request(), [
            'title'=>'required|string',
            'body'=>'required|string',
        ]);
        $post = new Post;

        $post->title = request('title');
        $post->description = request('synopsis');
        $post->article = request('body');
        $post->status_id=1;//current
        $post->visible = true;

        $post->save();

        return redirect('/posts/'.$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',[
            'post' => $post,
        ]);
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
        $post->visible=false;
        if(Request::get('submit')=='save') {
            $this->validate(request(), [
                'title' => 'required|string',
                'body' => 'required|string',
            ]);


            $post->status_id=3;// updated
            $post->save();

            $post = new Post();
            $post->title = request('title');
            $post->description = request('synopsis');
            $post->article = request('body');
            $post->status_id=1;// current
            $post->visible=true;
            $post->save();
            return Redirect::to('/posts/' . $post->id);
        } else if(Request::get('submit')=='remove'){
            $post->status_id=4;// removed
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
