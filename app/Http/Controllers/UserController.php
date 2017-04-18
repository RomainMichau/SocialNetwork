<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }
    public function edit(Guard $auth){
        $user = $auth->user();
        return view('user/edit', compact('user'));
    }
    public function update(Guard $auth, Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'profil' => 'image',
        ]);
        $user = $auth->user();
        $user->update($request->only('name', 'profil'));
        return  redirect('/about')->with('message', 'profil modifié');
    }
    public function show(){
        $user = Auth::user();
        return view('user.show', compact('user'));
    }
}
