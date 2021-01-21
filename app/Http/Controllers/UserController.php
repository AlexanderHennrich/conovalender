<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
               $this->middleware('auth');
    }
    public function index(){

       $users = User::all()->sortBy([['Punkte','desc']]);

        return view ('user.index',compact('users'));

    }
    public function show(User $user)
    {

        If(Auth::user()->id != $user->id) {
            $this->authorize('show', $user);
        }else{}

        return view('user.show', compact('user'));
    }

    public function edit(User $user){

            $this->authorize('show', $user);

        return view ('user.edit',compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('show',$user);

        $data =request()->validate(['admin'=> 'nullable','active'=>'nullable']);
        $user->update($data);
        return redirect('/user');
    }

    public function destroy(User $user)
    {
        $this->authorize('show',$user);
        $user->delete();
        return redirect('/user');
    }

}
