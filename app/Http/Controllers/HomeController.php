<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $answered_qeustions = $user->answers()->get();

        $answered_ids = collect();

        foreach($answered_qeustions as $answered_question){
            $answered_ids->push($answered_question->question_id);
        }

        $answers = Answer::all()->whereIn('question_id',$answered_ids);



        // Show Comments

        $comments = Comment::all();

        return view('home',compact(['answers','comments']));
    }
}
