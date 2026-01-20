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
         $quiz = Quiz::where('user_id', auth()->id())
                ->where('is_completed', false)
                ->latest()
                ->first();

    if ($quiz) {
        return redirect()->route('questions.create', $quiz->id);
    }

    $categories = Category::all();
    return view('addQuiz', compact('categories'));
}
    // store quiz
   public function store(Request $request)
{
    $request->validate([
        'quiz_name'=> 'required|string|max:255',
        'category_id'=>'required|exists:categories,id',
    ]);

    $quiz = Quiz::create([
        'name' => $request->quiz_name,
        'category_id' => $request->category_id,
        'user_id' => auth()->id(),
        'is_completed' => false,
    ]);

    return redirect()
        ->route('questions.create', $quiz->id)
        ->with('success','Quiz created. Now add questions.');
}
    
}
