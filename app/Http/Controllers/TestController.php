<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        'playlist_id' => 'required|exists:playlistes,id',
        'answers_*' => 'required|integer|exists:answers,id',
    ]);


    $playlistId = $request->input('playlist_id');

    // Initialize the score
    $score = 0;

    // Collect the answers from the request
    $answers = [];
    foreach ($request->all() as $key => $value) {
        if (strpos($key, 'answers_') === 0) {
            $questionId = str_replace('answers_', '', $key);
            $answerId = $value;
 
            // Check if the answer is correct
            $answer = Answer::find($answerId);
            if ($answer && $answer->is_correct) {
                $score++;
            }

            $answers[] = [
                'question_id' => $questionId,
                'answer_id' => $answerId,
            ];
        }
    }

    if (strpos($key, 'answers_') === 0) {

    // Create the test entry
    $user = Test::where('playlist_id' , $playlistId)->delete();
    $questionCount = Question::where('playlist_id', $playlistId)->count();
    
    $test = Test::create([
        'user_id' => session('LoginId_U'),
        'playlist_id' => $playlistId,
        'score' => $score,
        'questionCount' => $questionCount,
    ]);

    return redirect()->route('Dashboard')->with('success', 'Test completed successfully!');

}

       return redirect()->back()->with('error', '');


  }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        //
    }
}
