<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Like;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MurController extends Controller
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
        $friendships = User::all();
        $users = array();
        $posts = array();
        foreach($friendships as $friendship)
        {
            if(Auth::user()->isFriendWith($friendship))
            {
                $users[] = $friendship;
                $posts = array_merge($posts, end($users)->posts()->where('voir', '=', '1', 'OR', 'voir', '=', '2')->with('event')->with('photo')->with('video')->with('comments')->with('likes')->get()->toArray());
            }
            else
            {
                $users[] =$friendship;
                $posts = array_merge($posts, end($users)->posts()->where('voir', '=', '2')->with('event')->with('photo')->with('video')->with('comments')->with('likes')->get()->toArray());

            }
        }


        $posts = collect($posts)->sortBy('created_at')->reverse();

        $posts = json_decode(json_encode($posts));

        foreach ($posts as $post){

            $post->comments=collect($post->comments)->sortBy('created_at')->reverse();
        }

        return view('admin.mur.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if(isset($request->avis)&&$request->avis!=""){
        $post = Post::findOrFail($id);
        $user = Auth::user();
        $like=new Like;
        $like->like=$request->avis;
        $like->post_id=$post->id;
        $like->user_id=$user->id;
        $like->save();}
        elseif (isset($request->comment)&&$request->comment!=""){
            $post = Post::findOrFail($id);
            $user = Auth::user();
            $comment=new Comment();
            $comment->comment=$request->comment;
            $comment->post_id=$post->id;
            $comment->user_id=$user->id;
            $comment->save();}

        return Redirect::back();

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
    public function edit($id)
    {
        //
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
