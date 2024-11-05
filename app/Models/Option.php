<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'poll_id',
        'body'
    ];

    public function poll(){
        return $this->belongsTo(Poll::class,'poll_id');
    }

    public function votes(){
        return $this->hasMany(Vote::class,'option_id');
    }
}
