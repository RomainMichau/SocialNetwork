<?php

namespace App\Http\Controllers\Admin;

use App\Like;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LikesController extends Controller
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
        $like=DB::table('likes')->where([['post_id',$id],['user_id',$user->id]])->delete();
        return Redirect::back();
    }
    //
}


