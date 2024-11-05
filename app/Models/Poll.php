<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poll extends Model
{
    
    protected $fillable = [
        'title',
        'is_active'
    ];

    public function options(){
        return $this->hasMany(Option::class,'poll_id');
    }

    public function votes(){
        return $this->hasMany(Vote::class,'poll_id');
    }
}
