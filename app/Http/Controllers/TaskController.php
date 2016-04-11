<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Http\Requests;
use Flash;

class TaskController extends Controller
{
    //

    public function take($taskId) {
        $user = Auth::user();
        $userid = $user->id;
        $preEntry = DB::table('activities')
            ->where('userId', $userid)
            ->where('taskId', $taskId)
            ->get();
        if (count($preEntry) == 0) {
            DB::table('tasks')
                ->where('taskId', $taskId)
                ->update(['isTaken' => true]);
            DB::table('activities')->insert([
                'userId' => $userid,
                'taskId' => $taskId,
            ]);
            Flash::success('Be sure to complete before deadline.');
            return Redirect::to('task/view');
        } else {
            Flash::error('You have already taken that task.');
            return "You have already taken that task.";
        }

    }

    public function taskDetail($taskId) {
        
        return $taskId;
    }

    public function view() {
        $tasks = DB::table('tasks')->get();
        return view('viewtask')->with('tasks', array_reverse($tasks));
    }

    public function store(Request $request) {
    	$user = Auth::user();
    	$userid = $user->id;

        //validate the submitted form
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'max:65535',
            'deadline' => 'max:255|date',
            'bounty' => 'required|max:255',
        ]);
    	
        $residence = DB::table('residences')
            ->where('userid', $userid)
            ->where('isActive', true)
            ->first();

    	if (count($residence) == 0) {
            Flash::error('You have not registered with an address, please add an address first');
            return Redirect::to('/address/update');
        }

    	$residenceid = $residence->residenceId;
        DB::table('tasks')->insert([
            'residenceId' => $residenceid,
            'userId' => $userid,
            'isTakenById' => 0,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'releaseDate' => Carbon::now(),
            'deadline' => $request->input('deadline'),
            'bounty' => $request->input('bounty'),
            'isActive' => true,
            'isTaken' => false,
            'isCompleted' => false,
        ]);
        
        Flash::success('A new task has been posted!');
    	return Redirect::to('/');

    }
}
