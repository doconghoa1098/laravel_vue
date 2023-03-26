<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\User as ResourcesUser;
use App\Models\User;

class UserController extends Controller
{
    public $userSvc;

    public function __construct(UserService $userSvc)
    {
        $this->userSvc = $userSvc;
    }

    public function index(Request $request)
    {
        return $this->userSvc->listUser($request);
    }
}
