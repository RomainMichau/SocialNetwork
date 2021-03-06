<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class EventsController extends Controller
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

        $posts=Auth::user()->posts()->where('type',2)->with('event')->get();

        return view('admin.events.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $voir = array(0 => 'Moi uniquement', 1 => 'Mes amis', 2 => 'Tout le monde');
        return view('admin.events.create', compact('voir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        $event->title = $request->get('title');
        $event->date = $request->get('date');
        $event->description = $request->get('description');
        $event->save();
        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->photo_id = 0;
        $post->video_id = 0;
        $post->event_id = $event->id;
        $post->type = 2;
        $post->voir = $request->get('voir');
        $post->save();
        return redirect()->route('about')->with('message', 'New Event!!!');;



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
