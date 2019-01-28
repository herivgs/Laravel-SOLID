<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;

use App\Types\User;
use App\BusinessLayer\UserProcessor;
use App\Contracts\BusinessLayer\IUserProcessor;
use App\Http\Controllers\Controller;
use App\Exceptions\BusinessLayerException;

class UserService extends Controller
{
    /**
    * The User repository instance
    *
    * @var IUserProcessor
    */
    protected $UserProcessor;

    /**
    * Create a new controller instance.
    *
    * @param IUserProcessor $UserProcessor
    */
    public function __construct(IUserProcessor $UserProcessor)
    {
        $this->middleware('auth');
        $this->UserProcessor = $UserProcessor;
    }

    public function index()
    {
        $users = $this->UserProcessor->getAll();

        if ($users->toArray())
        {
        return response()->json($users->toArray(), 200);
        }
        else
        {
        return response()->json($users->toArray(), 404);
        }
    }
}
