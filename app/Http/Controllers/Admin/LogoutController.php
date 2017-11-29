<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;


use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    

    public function logout(Request $request)
    {

    	return Auth::guard('admin')->logout();
    }
}
