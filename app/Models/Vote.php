<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'poll_id',
        'option_id',
        'voter_ip'
    ];

    public function poll(){
        return $this->belongsTo(Poll::class,'poll_id');
    }

    public function option(){
        return $this->belongsTo(Option::class,'option_id');
    }
}
