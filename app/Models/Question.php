<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['round_id', 'question', 'answer', 'distractors'];

    public function round() {
        return $this->belongsTo('App\Models\Round');
    }

    public function getOptionsAttribute() {
        $options = [];
        $options[] = $this->answer;
        foreach(explode(",", $this->distractors) as $distractor) {
            $options[] = $distractor;
        }

        shuffle($options);

        return $options;
    }
}
