<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    

    public function poll_sumission(Request $request,Poll $poll){
        $ip = $request->ip();

        $is_voted = Vote::where('voter_ip',$ip)->exists();
        
        if(!$is_voted){
            Vote::create(['poll_id'=>$poll->id,'option_id'=>$request->select_option,'voter_ip' => $ip]);
            return redirect()->route('user.poll.index')->with(['message'=>'Your vote is successfully recorded','status' => 'success']);
        }
        
        return redirect()->route('user.poll.index')->with(['message'=>'You have voted before','status' => 'danger']);
    }
}
