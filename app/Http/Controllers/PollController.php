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
        return redirect()->route('poll.index')->with(['message'=>'Poll is successfully created','status' => 'success']);
    }

    public function destroy(Poll $poll){
        $poll->delete();
        return redirect()->route('poll.index')->with(['message'=>'Poll is successfully deleted','status' => 'danger']);
    }

    public function update(Request $request, Poll $poll){
        $poll->update($request->all());
        return redirect()->route('poll.index')->with(['message'=>'Poll is successfully updated','status' => 'warning']);
    }

    public function user_index(){
        $models = Poll::where('is_active','1')->orderBy('created_at','desc')->first();
        return view('userPages.poll',['models'=>$models]);
    }
}
