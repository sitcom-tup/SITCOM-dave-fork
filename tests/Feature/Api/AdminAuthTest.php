<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    // use RefreshDatabase;
    public $token;

    public function setUp() : void
    {
        parent::setup();
        $this->token = $this->createToken(2);
    }

    /**
     * @override
     */
    public function createToken(int $roleId)
    {
        return '';
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_login()
    {

        $response = $this->postJson('/api/v1/login',[
            'email' => 'admin@sit.com',
            'password'=> 'password',
            'role' => 'admin'
        ]);
        
        $this->token = $response['meta']['token'];
        $response->assertStatus(200);

        return $this->token;
    }

    /**
     * Depends annotation will get the returned value from the above method
     * @depends test_admin_can_login
     */
    public function test_admin_can_logout($token)
    {   
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token
        ])->post('/api/v1/logout',['role' => 'Admin']);

        $response->assertStatus(200)
                ->assertExactJson([
                    'status' => 'success',
                    'table' => 'Admins',
                    'message' => 'Successfully logged out'
        ]);
    }

}
