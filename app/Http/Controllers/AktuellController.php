<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Comment;
use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use function Illuminate\Events\queueable;

class AktuellController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $user = Auth::user();


        // Check which Question to show
        $all_questions = Question::where([['showDate', '<=', Carbon::today()], ['endDate', '>=', Carbon::today()]])->get();
        $questions = collect();
        foreach ($all_questions as $question) {

            if (!$user->answers()->where('question_id', $question->id)->exists()) {

                $questions->push($question);

            }

        }



        return view('aktuell.index', compact('questions'));


    }

}
