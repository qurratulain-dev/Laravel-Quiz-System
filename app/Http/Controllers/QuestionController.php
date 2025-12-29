<?php

namespace App\Http\Controllers;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Quiz;

class QuestionController extends Controller
{
    // add question page
        public function create(Quiz $quiz){
             return view('addQuestion',compact('quiz'));
        }
     // store question
        public function store(Request $request, Quiz $quiz){
            $request->validate([
                'question'=>'required|string|min:10',
                'option1'=>'required',
                'option2'=>'required',
                'option3'=>'required',
                'option4'=>'required',
                'correct_option'=>'required|in:"1","2","3","4"',
            ]);
            Question::create([
                'quiz_id'=>$quiz->id,
                'question_text'=>$request->question,
                'option1'=>$request->option1,
                'option2'=>$request->option2,
                'option3'=>$request->option3,
                'option4'=>$request->option4,
                'correct_option'=>$request->correct_option,
            ]);
            if($request->action === 'done'){
                return redirect()->route('dashboard')->with('success', 'Quiz added successfully.');
            }
            // store question and options logic here
            return redirect()->route('questions.create', $quiz)->with('success','Question added successfully.');

        }
}
