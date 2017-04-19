<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friendships = Auth::user()->getAllFriendships();
        $users = array();
        $posts = array();
        foreach($friendships as $friendship)
        {
            if(Auth::user()->id == $friendship->sender_id)
            {
                $users[] = User::findOrFail($friendship->recipient_id);
                $posts = array_merge($posts, end($users)->posts()->with('comments')->with('likes')->get()->toArray());
            }
            else
            {
                $users[] = User::findOrFail($friendship->sender_id);
                $posts = array_merge($posts, end($users)->posts()->with('comments')->with('likes')->get()->toArray());
            }
        }
        $posts = collect($posts)->sortBy('created_at')->reverse();
        $posts = json_decode(json_encode($posts));
        $users = User::all();
        return view('admin.mur.index', compact('posts', 'users'));

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
    public function store(Request $request)
    {
        //
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
        //
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
