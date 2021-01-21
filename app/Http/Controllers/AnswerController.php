<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AnswerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $user_name = User::where('id', $user_id)->first()->name;
        $question = Question::all()->where('id', '=', request()->question_id)->first();

        if ($question->media_answer) {
            // Handle Media - Answer
            $data = request()->validate(['media' => 'required',
                    'question_id' => 'required',
                    'question_name' => 'required',
                ]) + ['user_id' => $user_id, 'user_name' => $user_name];


            $path = $request->file('media')->store('public/answers');
            $data['media_url'] = $path;

        } else {
        // Handle text_Answer
            $data = request()->validate(['answer' => 'required',
                    'question_id' => 'required',
                    'question_name' => 'required',
                ]) + ['user_id' => $user_id, 'user_name' => $user_name];

        }

        $answer = Answer::create($data);
        return Redirect::back();
    }


    public function update(Answer $answer, User $user)
    {

        $data = request()->validate(['Punkte' => 'nullable']);
        $answer->update($data);

        $user = $answer->user()->first();


        $user->update(['Punkte' => $user->countPoints()]);


        return Redirect::back();//redirect ('/user');
    }


}
