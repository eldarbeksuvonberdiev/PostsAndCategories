<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    
    public function index(){
        $models = Poll::orderBy('created_at','desc')->paginate(10);
        return view('adminPages.poll',['models'=>$models]);
    }

    public function store(Request $request){
        Poll::create($request->all());
        return redirect()->route('poll.index');
    }

    public function detroy(Poll $poll){
        $poll->delete();
        return redirect()->route('poll.index');
    }

    public function update(Request $request, Poll $poll){
        $poll->update($request->all());
        return redirect()->route('poll.index');
    }
}
