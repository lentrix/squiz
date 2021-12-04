<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaffleItem extends Model
{

    protected $fillable = ['name','sponsor','user_id','drawn_at'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
