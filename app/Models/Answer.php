<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['attempt_id', 'question_id', 'answer'];

    public function attempt() {
        return $this->belongsTo('App\Models\Attempt');
    }

    public function question() {
        return $this->belongsTo('App\Models\Question');
    }


}
