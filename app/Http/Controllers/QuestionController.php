<?php

namespace App\Http\Controllers;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Quiz;

class QuestionController extends Controller
{
    public function index(Quiz $quiz)
{
    $questions = $quiz->questions()->latest()->get();
    return view('questionList', compact('quiz', 'questions'));
}
    // add question page
        public function create(Quiz $quiz)
{
    // quiz completed check
    if ($quiz->is_completed) {
        return redirect()->route('admin.dashboard')
            ->with('error', 'This quiz is already completed.');
    }

    // question count
    $questionCount = $quiz->questions()->count();

    return view('addQuestion', [
        'quiz' => $quiz->load('category'),
        'questionCount' => $questionCount
    ]);
}

     // store question
       public function store(Request $request, Quiz $quiz)
{
    $request->validate([
        'question'=>'required|string|min:10',
        'option1'=>'required',
        'option2'=>'required',
        'option3'=>'required',
        'option4'=>'required',
        'correct_option'=>'required|in:1,2,3,4',
    ]);

    Question::create([
        'quiz_id' => $quiz->id,
        'question_text' => $request->question,
        'option1' => $request->option1,
        'option2' => $request->option2,
        'option3' => $request->option3,
        'option4' => $request->option4,
        'correct_option' => $request->correct_option,
    ]);

    //  ADD & SUBMIT
    if ($request->action === 'done') {

        // quiz yahin finish hoga
        $quiz->update([
            'is_completed' => true
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Quiz completed successfully.');
    }

    //  ADD MORE quiz unfinished
    return redirect()
        ->route('questions.create', $quiz->id)
        ->with('success', 'Question added. Add next one.');
}
public function edit(Question $question)
{
    // load quiz to show in form
    $quiz = $question->quiz()->with('category')->first();

    return view('questionListEdit', compact('question', 'quiz'));
}
public function update(Request $request, Question $question)
{
    $request->validate([
        'question' => 'required|string',
        'option1' => 'required|string',
        'option2' => 'required|string',
        'option3' => 'required|string',
        'option4' => 'required|string',
        'correct_option' => 'required|in:1,2,3,4',
    ]);

   $question->update([
    'question_text' => $request->question,
    'option1' => $request->option1,
    'option2' => $request->option2,
    'option3' => $request->option3,
    'option4' => $request->option4,
    'correct_option' => $request->correct_option,
]);
    return redirect()->route('questions.index', $question->quiz_id)
        ->with('success', 'Question updated successfully!');
}
public function destroy(Question $question)
{
    $quizId = $question->quiz_id;

    $question->delete();

    return redirect()
        ->route('questions.index', $quizId)
        ->with('success', 'Question deleted successfully!');
}

}
