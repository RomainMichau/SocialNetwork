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
        $posts = array();
        if($user->isFriendWith(Auth::user())){
            $posts = array_merge($posts, $user->posts()->where('voir', '=', 1)->with('event')->with('photo')->with('video')->with('comments')->with('likes')->get()->toArray());
            $posts = array_merge($posts, $user->posts()->where('voir', '=', 2)->with('event')->with('photo')->with('video')->with('comments')->with('likes')->get()->toArray());
        }
        else
        {
            $posts = array_merge($posts, $user->posts()->where('voir', '=', 2)->with('event')->with('photo')->with('video')->with('comments')->with('likes')->get()->toArray());
        }
        $posts = collect($posts)->sortBy('created_at')->reverse();
        $posts = json_decode(json_encode($posts));
        foreach ($posts as $post){
            $post->comments=collect($post->comments)->sortBy('created_at')->reverse();
        }
        return view('admin.users.show', compact('posts'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->type != 1)
            $user->delete();
        return redirect()->route('admin.users.index');
    }
}
