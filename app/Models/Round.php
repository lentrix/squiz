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
}
