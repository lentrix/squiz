<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    protected $fillable = ['round_id', 'user_id', 'start', 'end'];

    public $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function round() {
        return $this->belongsTo('App\Models\Round');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function answers() {
        return $this->hasMany('App\Models\Answer');
    }

    public function getResultAttribute() {
        $score = 0;
        foreach($this->answers as $ans) {
            if($ans->answer==$ans->question->answer) {
                $score+=1;
            }
        }

        return [
            'score' => $score,
            'time' => $this->start ? $this->start->diffInSeconds($this->end) : '-'
        ];
    }

    public function getFilteredResultAttribute() {
        $score = 0;
        foreach($this->round->questions as $question) {
            $answer = Answer::where('attempt_id', $this->id,'question_id', $question->id)->first();
            if($answer->answer == $question->answer) {
                $score++;
            }
        }

        return $score;
    }
}
