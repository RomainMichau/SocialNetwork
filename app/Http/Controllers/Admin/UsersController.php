<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        $users = $users->sortBy('name');
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if($user->isFriendWith(Auth::user()))
            $posts = $user->posts()->where('voir', '=', '1', 'OR', 'voir', '=', '2')->with('event')->with('photo')->with('video')->with('comments')->with('likes')->get();
        else{
            $posts = $user->posts()->where('voir', '=', '2')->with('event')->with('photo')->with('video')->with('comments')->with('likes')->get();
        }

        return view('admin.users.show', compact('posts'));
    }
}
