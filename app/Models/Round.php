<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $fillable = ['quiz_id','round_no','name','active','activated_at','closed_at'];

    protected $casts = [
        'activated_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function quiz() {
        return $this->belongsTo('App\Models\Quiz');
    }

    public function questions() {
        return $this->hasMany('App\Models\Question');
    }

    public function attempts() {
        return $this->hasMany('App\Models\Attempt');
    }

    public function getSummaryAttribute() {
        $summary = [];
        $attempts = Attempt::where('round_id', $this->id)
            ->with('user');
        foreach($this->attempts as $attempt) {
            $result = $attempt->result;

            $summary[] = [
                'id' => $attempt->user->id,
                'name' => $attempt->user->name,
                'score' => $result['score'],
                'time' => $result['time']
            ];
        }

        usort($summary, function($a, $b){
            $retVal = $b['score'] <=> $a['score'];
            if($retVal==0) {
                $retVal = $a['time'] <=> $b['time'];
            }
            return $retVal;
        });

        return $summary;
    }


}
