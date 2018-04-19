<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

//use Illuminate\Http\Request;
use Request;
use Session;
use App\Post;
use Auth;
use File;

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
        $posts = $posts->where('public',true)->where('status_id',Post::current);
        # columnize $posts
        $col_posts = [];
        $i = 0;
        foreach($posts as $key => $post) {
            $col_posts[$i % 3][]=$post;
            $i++;
        }
        return view('posts.list',[
            'posts' => $col_posts,
            'stash'=>false,
        ]);
    }

    public function stash()
    {
        $posts = Post::all();
        $posts = $posts->where('user_id',Auth::user()->id)->where('status_id',Post::drafted);
        # columnize $posts
        $col_posts = [];
        $i = 0;
        foreach($posts as $key => $post) {
            $col_posts[$i % 3][]=$post;
            $i++;
        }
        return view('posts.list',[
            'posts' => $col_posts,
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
        if( ($post->status_id == Post::current) || (Auth::check() && $post->user_id == Auth::user()->id && $post->status_id == Post::drafted)){
            return view('posts.show', [
                'post' => $post,
            ]);
        }
        return redirect('/posts');
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
        $user_id = $post->user_id;
        $post->public = false;
        if (Request::get('submit') == 'publish') {
            $this->validate(request(), [
                'title' => 'required|string',
                'body' => 'required|string',
                'synopsis' => 'required|string',
            ]);


            $post->status_id = Post::updated;
            $post->save();

            $post = new Post();
            $post->title = request('title');
            $post->description = request('synopsis');
            $post->article = request('body');
            $post->status_id = Post::current;
            $post->public = true;
            $post->user_id = $user_id;
            $post->save();
            return Redirect::to('/posts/' . $post->id);
        } else if (Request::get('submit') == 'stash'){
            $this->validate(request(), [
                'title' => 'required|string',
                'body' => 'required|string',
                'synopsis' => 'required|string',
            ]);
            $post->status_id = Post::updated;
            $post->save();

            $post = new Post();
            $post->title = request('title');
            $post->description = request('synopsis');
            $post->article = request('body');
            $post->status_id = Post::drafted;
            $post->public = false;
            $post->user_id = $user_id;
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
    public function setlive()
    {
        $content = request('content');
        $file = "test.blade.php";
        $fp = fopen($file, 'w+');
        fwrite($fp, $content);
        fclose($fp);
    }
    public function getlive()
    {
        #return view('posts.test');
        return File::get(public_path()."/test.blade.php");
    }
}
