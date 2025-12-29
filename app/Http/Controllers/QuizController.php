<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Quiz;

class QuizController extends Controller
{
    // Add Quiz page
    public function create()
    {
        $categories = Category :: all();
        return view('addQuiz', compact('categories'));
    }
    // store quiz
    public function store(Request $request){
        $request->validate([
            'quiz_name'=> 'required|string|max:255',
            'category_id'=>'required|exists:categories,id',
        ]);
        $quiz=Quiz::create([
            'name'=>$request->quiz_name,
            'category_id'=>$request->category_id,
        ]);
          return redirect()->route('questions.create', $quiz)->with('success','Quiz created successfully. Now you can add questions.');
    //     $quiz = Quiz::latest()->first();
    //     return redirect()->route('addQuestion', $quiz)->with('success','Quiz created successfully. Now you can add questions.');
    // 
    }
}
