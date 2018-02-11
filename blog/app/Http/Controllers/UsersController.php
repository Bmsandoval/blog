<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $user = new invited_user;
        $user->email = request('email', true);
        $user->token = sha1(uniqid($user->email));
        $user->save();

        $url = route('user.store',['token'=>$user->token]);
        $message = <<<ENDMSG
Thank you for signing up at our site.  Please go to
$url to activate your account.
ENDMSG;
        mail($user->email, "Activate your account", $message);

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

        $user = new user;
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
    public function show(User $user)
    {
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
    public function edit(user $user)
    {
        return view('users.edit',[
            'user'=>[
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
    public function update($id)
    {
        $this->validate(request(), [
            'name'=>'required|string',
            'username'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
        ]);

/*        $user = new user;*/
        $user = user::find($id);
        $user->name = request('name');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->save();

        Auth::attempt([ 'email'=>$user->email, 'password'=>request('password') ]);
        return Redirect::to('/users/' . $user->id);
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
