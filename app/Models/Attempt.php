<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    protected $fillable = ['round_id', 'user_id', 'start', 'end'];

    public function round() {
        return $this->belongsTo('App\Models\Round');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
