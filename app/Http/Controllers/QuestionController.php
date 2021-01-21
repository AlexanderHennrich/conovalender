<?php

namespace App\Http\Controllers;

use App\Models\Question;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $questions = Question::all();
        return view('question.index', compact('questions'));
    }


    public function create()
    {

        $question = new Question();
        return view('question.create', compact('question'));
    }


    public function store(Request $request)
    {
        $data = $this->validatedData();
        if($request->file('media')) {
            $path = $request->file('media')->store('public/questions');
            $data['media_url'] = $path;
        }


        $question = Question::create($data);
        return redirect('/question/' . $question->id);

    }

    public function update(Question $question, Request $request)
    {
        $data = $this->validatedData();

        if($request->file('media')) {

                if($question->media_url){
                   Storage::delete($question->media_url);

                }
            $path =$request->file('media')->store('public/questions');
            $data['media_url'] = $path;
        }

        $question->update($data);
        return redirect('/question');
    }


    public function edit(Question $question)
    {
        return view('question.edit', compact('question'));
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect('/question');
    }

    public function show(Question $question)
    {
        return view('question.show', compact('question'));
    }


    private function validatedData()
    {

        return request()->validate([
            'name' => 'required',
            'text' => 'required',
            'showDate' => 'nullable',
            'endDate'=>'nullable',
            'Punkte' => 'nullable',
            'media_url' => 'nullable',
            'media_answer'=>'nullable',
            'time' => 'nullable',
        ]);
    }

}
