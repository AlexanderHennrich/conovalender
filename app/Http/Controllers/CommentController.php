<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {
        $user_id = Auth::id();
        $data = request()->validate(['comment' => 'required']);

        $data['user_id'] = $user_id;


        Comment::create($data);
        return Redirect::back();


    }
}
