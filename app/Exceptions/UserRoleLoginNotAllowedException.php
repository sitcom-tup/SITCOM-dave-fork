<?php

namespace App\Exceptions;

use Exception;

class UserRoleLoginNotAllowedException extends Exception
{
    protected $message = "User not allowed";
    protected $user;

    public function __construct($user, $message = "", $code = 0, Exception $previous = NULL)
    {
        parent::__construct($message,$code,$previous);
        $this->user = $user;     
    }

    public function render($request)
    {
        return response()->json([
            'status'=>'failed',
            'code' => 401,
            'message'=>'You do not have access to this role',
            'table' =>'users',
            'data'=> $this->user
        ]);
    }
}
