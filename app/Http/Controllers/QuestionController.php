<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Formateur;
use App\Models\playliste;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = session('LoginId_F');
        $formateur = Formateur::find($id);
        // $courses = Course::where('formateur_id' ,session('LoginId_F') )->get();
        $playliste = Playliste::where('formateur_id', $id)
        ->with('questions', 'questions.answers')
        ->get();
        // $courseIds = playliste::where('formateur_id', $id)->pluck('course_id')->unique();


        
   
        return view('formateur.QuestionPlayliste.index', compact('formateur','playliste'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'playlist_id' => 'required',
            'question' => 'required|string|max:255',
            'answer_1' => 'required|string|max:255',
            'answer_2' => 'required|string|max:255',
            'answer_3' => 'required|string|max:255',
            'answer_4' => 'required|string|max:255',
            // Add validation for the radio buttons
            'correct_answer_1' => 'required|in:true,false',
            'correct_answer_2' => 'required|in:true,false',
            'correct_answer_3' => 'required|in:true,false',
            'correct_answer_4' => 'required|in:true,false',
        ]);

        // Create a new question instance
        $question = new Question();
        $question->playlist_id = $request->playlist_id;
        $question->question_text = $request->question;
        $question->save();

        // Save answers
        $answers = [];
        for ($i = 1; $i <= 4; $i++) {
            $answers[] = [
                'answer_text' => $request->input("answer_$i"),
                'is_correct' => $request->input("correct_answer_$i") === 'true' ? true : false,
                'question_id' => $question->id,
            ];
        }
        foreach ($answers as $answer) {
            Answer::create($answer);
        }

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Question created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $Question = Question::find($id);
        $Question->delete();

        return redirect()->back()
                         ->with('success','Course deleted successfully');
    }
}
