<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\CoordinatorProfileResource;
use App\Http\Requests\UpdateCoordinatorProfile;
use App\Http\Resources\ProfileCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\Token;
use App\Models\Coordinator;
use App\Models\User;
use Hash;

class CoordinatorProfileController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'limit' => 'nullable|integer',
        ]);

        $coor = Coordinator::with(['user','department']);

        if($request->name)
        {
            $coor->whereHas('User', function($query) use ($request) {
                $query->where('fname','LIKE', '%'.$request->name.'%')
                    ->orWhere('lname','LIKE', '%'.$request->name.'%');
            });
        }

        $request->has('limit') ? $limit = $request->limit : $limit = 12;

        $lists = $coor->latest()->paginate($limit);

        return new ProfileCollection(CoordinatorProfileResource::collection($lists),$lists);
    }

    public function update($id,UpdateCoordinatorProfile $coorRequest)
    {
        $coor = Coordinator::findOrFail($id);
        $coorRequest['user_id'] = $coor->user_id;

        if($coorRequest->has('password'))
        {
            $coorRequest['password'] = Hash::make($coorRequest->password);
        }

        $coor->update($coorRequest->except(['fname','lname','password','email','coordinator_id','state']));
        $coor->user()->update($coorRequest->only(['fname','lname','email','password','state']));

        return (CoordinatorProfileResource::make(Coordinator::with(['user','department'])->find($id)))
                ->additional(['message'=>'updated']);

    }

    public function show($id)
    {
        return new CoordinatorProfileResource(Coordinator::with(['user','department'])->find($id));
    }


    public function destroy($id)
    {
        User::whereHas('Coordinator', function($query) use($id){
            $query->where('id', $id);
        })->update(['state' => 0]);

        $coor = Coordinator::with(['user','department'])->find($id);

        //Revoke token of user 
        Token::where('name', $coor->user->email)
            ->update(['revoked' => true]);

        return (CoordinatorProfileResource::make($coor))
                ->additional(['message'=>'deactivated']);
    }

}
