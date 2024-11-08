<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Poll;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    

    public function store(Request $request, Poll $poll){
        Option::create(['poll_id'=>$poll->id,'body'=>$request->title]);
        return redirect()->route('poll.index')->with(['message'=>'Option is successfully created','status' => 'success']);
    }

    public function statistic(Poll $poll){
        $options = $poll->options()->pluck('body');
        $votes = $poll->options()->withCount('votes')->pluck('votes_count');
        return view('adminPages.statistic',['options'=>$options,'votes'=>$votes]);
    }
}
