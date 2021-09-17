<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\ColumnCardResource;
use App\Http\Requests\TaskBoardRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColumnCard;

class TaskBoardController extends Controller
{
    public function index(TaskBoardRequest $request)
    {
        $tasks = ColumnCard::query();
        
        if($request->has('user'))
        {
            $cards = [];
            $assigned = ColumnCard::where('assignees','LIKE','%'.$request->user.'%')->pluck('assignees');
            foreach($assigned as $value)
            {
                $temp = explode(',',$value);
                in_array($request->user, $temp) ? array_push($cards,$value) : $cards; 
            }
           $tasks->whereIn('assignees',$cards);
        }

        $request->has('verified') ?
        $tasks->where('verified', $request->verified):
        $tasks;

        $request->has('status') ?
        $tasks->where('status',$request->status):
        $tasks;

        $request->has('start_date') ?
        $tasks->whereDate('start_date', $request->start_date):
        $tasks;

        $request->has('due_date') ? 
        $tasks->whereDate('due_date', $request->due_date):
        $tasks;

        $request->has('start_date') && $request->has('due_date')?
        $tasks->whereBetween('start_date', [$request->start_date,$request->due_date]):
        $tasks;

        $request->has('order_by') ?
        $tasks->orderBy($request->order_by,$request->order_as) :
        $tasks;

        return ColumnCardResource::collection($tasks->get());
    }
}
