<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Attempt;
use App\Models\Question;
use App\Models\Round;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoundController extends Controller
{

    public function __construct() {
        $this->middleware('admin')->except(['attempt','submitAttempt','summary','showResult']);
    }

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

        return redirect('/round/' . $roundID . '/modify')->with('Info','A question has been updated.');
    }

    public function attempt(Round $round) {
        $userID = auth()->user()->id;

        $attempt = Attempt::where('round_id', $round->id)
            ->where('user_id', $userID)->first();

            if(!$attempt) {
            $attempt = Attempt::create([
                'round_id' => $round->id,
                'user_id' => $userID,
                'start' => Carbon::now()
            ]);
        }

        if($round->closed_at) {
            return redirect('/round/' . $round->id . '/summary')->with('Info','This round is already closed.');
        }

        if($attempt->end) {
            return redirect('/result/' . $attempt->id);
        }

        return view('rounds.attempt', [
            'round' => $round,
            'attempt' => $attempt
        ]);
    }

    public function submitAttempt(Round $round, Request $request) {
        $userID = auth()->user()->id;

        $attempt = Attempt::where('round_id', $round->id)
            ->where('user_id', $userID)->first();

        foreach($request->answer as $key=>$ans) {
            Answer::create([
                'attempt_id' => $attempt->id,
                'question_id' => $key,
                'answer' => $ans
            ]);
        }

        $attempt->update([
            'end' => Carbon::now()
        ]);

        return redirect('/result/' . $attempt->id);
    }

    public function showResult(Attempt $attempt) {
        return view('rounds.result', [
            'attempt'=>$attempt
        ]);
    }

    public function summary(Round $round) {

        return view('rounds.summary', [
            'round' => $round,
        ]);
    }
}
