<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Round;
use Illuminate\Http\Request;

class RoundController extends Controller
{
    public function activate(Round $round) {
        $round->update([
            'active' => 1,
            'activated_at' => now(),
            'closed_at' => null
        ]);

        return back()->with('Info', 'The round ' . $round->name . " has been activated.");
    }

    public function close(Round $round) {
        $round->update([
            'active' => 0,
            'closed_at' => now()
        ]);

        return back()->with('Info', $round->name . ' has been closed.');
    }

    public function modify(Round $round) {
        return view('rounds.edit', [
            'round' => $round
        ]);
    }

    public function addQuestionForm(Round $round) {
        return view('rounds.add-question',[
            'round' => $round
        ]);
    }

    public function editQuestionForm(Question $question) {
        return view('rounds.edit-question',[
            'question' => $question
        ]);
    }

    public function addQuestion(Round $round, Request $request) {
        $request->validate([
            'question' => 'string|required',
            'answer' => 'string|required',
            'distractors' => 'string|required',
        ]);

        Question::create([
            'round_id' => $round->id,
            'question' => $request->question,
            'answer' => $request->answer,
            'distractors' => $request->distractors
        ]);

        return redirect('/round/' . $round->id . '/modify')->with('Info','New question added.');
    }

    public function editQuestion(Question $question, Request $request) {
        $request->validate([
            'question' => 'string|required',
            'answer' => 'string|required',
            'distractors' => 'string|required',
        ]);

        $question->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'distractors' => $request->distractors
        ]);

        return redirect('/round/' . $question->round->id . '/modify')->with('Info','A question has been updated.');
    }

    public function deleteQuestion(Question $question) {
        $roundID = $question->round_id;

        $question->delete();

        return redirect('/round/' . $roundID . '/modify')->with('Info','A question has been deleted.');
    }
}
