<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function createToken(int $roleId)
    {
        $user = User::where('role', $roleId)->inRandomOrder()->first();  
        $token = $user->createToken($user->email. ' '. $user->fname, [$user->userRole()])->accessToken;
        return $token;
    }

}
