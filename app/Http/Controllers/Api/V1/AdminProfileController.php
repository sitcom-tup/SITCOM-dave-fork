<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminProfileResource;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Passport\Token;

class AdminProfileController extends Controller
{
    public function show($id)
    {
        return new AdminProfileResource(User::where('id', $id)->first());
    }

    // deactivate function
    public function destroy($id)
    {
        User::where('id', $id)->update(['state' => 0]);

        $admin = User::findOrFail($id);

        Token::where('name', $admin->email)->update(["revoked" => true]);
        
        return (AdminProfileResource::make($admin))
        ->additional(['message'=>'Account has been deactivated']);
    }
}
