<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Round;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    public function __construct() {
        $this->middleware('admin')->except(['show', 'index']);
    }

    public function create() {
        return view('quizzes.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
        ]);

        $quiz = Quiz::create([
            'title' => $request->title,
            'description' => $request->description,
            'code' => Str::random(6)
        ]);

        return redirect('/quiz/' . $quiz->id)->with('Info','New quiz created.');
    }

    public function show(Quiz $quiz) {
        return view('quizzes.view', [
            'quiz' => $quiz
        ]);
    }

    public function edit(Quiz $quiz) {
        return view('quizzes.edit', [
            'quiz' => $quiz
        ]);
    }

    public function addRound(Quiz $quiz, Request $request) {
        $request->validate([
            'round_name' => 'string|required',
            'round_number' => 'numeric|required'
        ]);

        Round::create([
            'quiz_id' => $quiz->id,
            'round_no' => $request->round_number,
            'name' => $request->round_name,
        ]);

        return back()->with('Info', 'New round added.');
    }
}
