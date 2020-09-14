<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        }
    public function store(User $user)
    {
        //following user

        return auth()->user()->following()->toggle($user->profile) ;//eli bech yfollowi
    }
}
