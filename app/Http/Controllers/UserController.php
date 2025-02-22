<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function me() 
    {
        $currentUser = Auth::user();
        return new UserResource($currentUser);
    }
}
