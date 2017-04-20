<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=Auth::user();
        $comment=DB::table('comments')->where([['post_id',$id],['user_id',$user->id]]);
        $comment->delete();
        return Redirect::back();

    }
}
