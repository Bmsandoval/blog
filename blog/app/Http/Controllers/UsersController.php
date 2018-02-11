<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

//use Illuminate\Http\Request;
use Session;
use App\Post;
use App\User;
use App\Pending_User;
use Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $users = User::all();
        return view('users.list',[
            'users' => $users->pluck('username'),
        ]);
    }

    public function send()
    {
        $this->validate(request(), [
            'email'=>'required|email',
        ]);
        $email = request('email');
        $user = new Pending_User([
            'email' => $email,
            'token' =>sha1(uniqid($email, true))
        ]);

        $url = route('users.store',['token'=>$user->token]);
        $message = <<<ENDMSG
Thank you for signing up at our site.  Please go to
$url to activate your account.
ENDMSG;
        mail($email, "Activate your account", $message);

        return redirect('/');
    }
    /**
     * Show the form for inviting a new blogger to the team.
     *
     * @return \Illuminate\Http\Response
     */
    public function invite()
    {
        return view('users.invite');
    }


    public function create($token)
    {
        if(!preg_match('/^[0-9A-F]{40}$/i', $token)){
            throw new Exception("Invalid registration token");
        }
        return view('users.create',[
            'token'=>$token
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $token)
    {
        $this->validate(request(), [
            'name'=>'required|string',
            'username'=>'required|string',
            'email'=>'required|email',
            'password'=>'required|string',
            'token'=>'required|string',
        ]);
        $pending = DB::table('pending_users')->find($token);
        if(empty($pending)){
            throw new Exception("Invalid registration token");
        }
        $pending->delete();

        $user = new User;
        $user->name = request('name');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->save();

        Auth::attempt([ 'email'=>$user->email, 'password'=>request('password') ]);
        return redirect('/users/'.$user->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = DB::table('users')->find(['username'=>$username]);
        return view('users.show',[
            'userid'=> $user->id,
            'user' => [
                'Username' => $user->username,
                'Name' => $user->name,
                'Email' => $user->email,
            ]
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = DB::table('users')->find(['username'=>$username]);
        return view('users.edit',[
            'user'=>[
                'id' => $user->id,
                'name' => $user->name,
                'username'=> $user->username,
                'email'=>$user->email
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($username)
    {
        $this->validate(request(), [
            'name'=>'required|string',
            'username'=>'required|string',
            'email'=>'required|string',
            'password'=>'string',
        ]);

/*        $user = new user;*/
        DB::table('users')->where('username',$username)->update([
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        return Redirect::to('/users/' . $username);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO: Uncomment this if I ever decide to allow user deletion from the site

        /*        $user = user::find($id);
                $user->delete();

                // redirect
                Session::flash('message', 'Successfully deleted the nerd!');
                return Redirect::to('/users');*/

    }
}
