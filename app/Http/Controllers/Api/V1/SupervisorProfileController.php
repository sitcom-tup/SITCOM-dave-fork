<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\SupervisorProfileResource;
use App\Http\Requests\UpdateSupervisorProfile;
use App\Http\Resources\ProfileCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\Token;
use App\Models\Supervisor;
use App\Models\User;
use Hash;

class SupervisorProfileController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'limit'=>'nullable|integer',
            'company' => 'nullable|string'
        ]);

        //TOOD: 
        //ADD TABLE FOR HANDLED TRAINEES HERE ON WITH
        $visor = Supervisor::with(['user']);
        
        if($request->has('name'))
        {
            $visor->whereHas('User', function($query) use ($request) {
                $query->where('fname','LIKE', '%'.$request->name.'%')
                    ->orWhere('lname','LIKE', '%'.$request->name.'%');
            });
        }

        if($request->has('company'))
        {
            $student->whereHas('Company', function($query) use ($request) {
                $query->where('comp_name', 'LIKE', '%'.$request->company.'%');
            });
        }

        $request->has('limit') ? $limit = $request->limit : $limit = 12;

        $lists = $visor->latest()->paginate($limit);

        return new ProfileCollection(SupervisorProfileResource::collection($lists),$lists);
    }

    public function update($id, UpdateSupervisorProfile $request)
    {
        $visor = Supervisor::findOrFail($id);
        $request['user_id'] = $visor->user_id;

        if($request->has('password'))
        {
            $request['password'] = Hash::make($request['password']);
        }
        
        if($request->has('verified_at'))
        {
            $request['email_verified_at'] = now();
        }

        $visor->update($request->except(['fname','lname','email','password','supervisor_id','state','email_verified_at','verified_at']));
        $visor->user()->update($request->only(['fname','lname','email','password','email_verified_at','state']));

        return (SupervisorProfileResource::make(Supervisor::with(['user'])->find($id)))
        ->additional(['message'=>'updated']);
    }


    public function show($id)
    {
        return new SupervisorProfileResource(Supervisor::with(['user'])->findOrFail($id));
    }

    public function destroy($id)
    {
        User::whereHas('Supervisor', function($query) use($id){
            $query->where('id', $id);
        })->update(['state' => 0]);

        $visor= Supervisor::with(['user'])->findOrFail($id);
        
        //Revoke token of user 
        Token::where('name', $visor->user->email)
        ->update(['revoked' => true]);

        return (SupervisorProfileResource::make($visor))
                ->additional(['message'=>'deactivated']);
    }
}
