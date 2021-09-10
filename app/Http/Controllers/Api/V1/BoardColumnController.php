<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreBoardColumnRequest;
use App\Http\Resources\BoardColumnResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BoardColumn;

class BoardColumnController extends Controller
{
    public function store(StoreBoardColumnRequest $request,BoardColumn $boardColumn)
    {
        $col = $boardColumn->updateOrCreate(['board_id'=>$request->board_id],$request->validated());
        
        return (BoardColumnResource::make($col))->additional(['message'=>'saved']);
    }

    public function destroy(StoreBoardColumnRequest $request)
    {
        // dd($request->all());
        $col = BoardColumn::where('board_id', $request->board_id)
                            ->where('column_name',$request->column_name)
                            ->first();
        $col->delete();

        return (BoardColumnResource::make($col))->additional(['message'=>'deleted']);
    }
}
