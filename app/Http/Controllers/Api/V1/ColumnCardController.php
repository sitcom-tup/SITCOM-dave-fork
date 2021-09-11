<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\ColumnCardResource;
use App\Http\Requests\StoreCardRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColumnCard;

class ColumnCardController extends Controller
{
    public function store(StoreCardRequest $request, ColumnCard $columnCard)
    {
        if($request->has('assignees'))
        {
            $request['assignees'] = implode(',',$request->assignees);
        }
        $card = $columnCard->create($request->all());

        return (ColumnCardResource::make($card))->additional(['message'=>'saved']);
    }

    public function update($id,StoreCardRequest $request, ColumnCard $columnCard)
    {
        // dd($columnCard);
        if($request->has('assignees'))
        {
            $request['assignees'] = implode(',',$request->assignees);
        }

        $card = $columnCard->findOrFail($id);
        $card->update($request->all());

        return (ColumnCardResource::make($card))->additional(['message'=>'updated']);
    }

    public function destroy($id)
    {
        $card = ColumnCard::findOrFail($id);
        $card->delete();
        return (ColumnCardResource::make($card))->additional(['message'=>'delete']);
    }
}
