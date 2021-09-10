<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreBoardRequest;
use App\Http\Resources\BoardCollection;
use App\Http\Resources\BoardResource;
use App\Services\ReceiveOrderNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\BoardRequest;
use Illuminate\Http\Request;
use App\Models\ColumnCards;
use App\Models\BoardUser;
use App\Models\Board;

class BoardController extends Controller
{
    public function index(BoardRequest $request, Board $board)
    {
        $boards = $board->with(['boardColumns','boardUsers']);

        $request->has('user') ?
        $boards->whereHas('BoardUsers', function($query) use($request) {
            $query->where('user_id', $request->user);
        }) :
        $boards;

        $request->has('name') ?
        $boards->where('board_name','LIKE','%'.$request->name.'%') :
        $boards;

        $request->has('board') ?
        $boards->where('id', $request->board) :
        $boards;

        $request->has('limit') ? $limit = $request->limit : $limit = 12;

        return new BoardCollection($boards->latest()->paginate($limit));
    }

    public function update($id, StoreBoardRequest $request)
    {
        $board = Board::with(['boardColumns','boardUsers'])->findOrFail($id);

        if($request->has('name')) {
            $board->update(['board_name' => $request->name]);
        }elseif ($request->has('users')) {
            $boardUsers = [];
            foreach($request->users as $user)
            {
                array_push($boardUsers, ['board_id'=>$id,'user_id',$user]);
            }
            $board->boardUsers()->updateOrCreate(['board_id'=>$id,'user_id'=>$user],$boardUsers);
        }else {
            return (BoardResource::make($board))->additional(['message'=>'failed']);
        }

        return (BoardResource::make($board))->additional(['message'=>'updated']);
    }

    public function store(StoreBoardRequest $request)
    {
        $id = new ReceiveOrderNumber();

        $board = Board::create(['id'=> $id->generateOrderNumber() ,'board_name' => $request->name]);
        if($request->has('users'))
        {
            $boardUsers = [];
            foreach($request->users as $user)
            {
                array_push($boardUsers, BoardUser::make(['board_id'=>$id,'user_id'=>$user]));
            }
            $board->boardUsers()->saveMany($boardUsers);
        }

        return (BoardResource::make($board->load(['boardUsers','boardColumns'])))->additional(['message'=>'saved']);
    }
}
