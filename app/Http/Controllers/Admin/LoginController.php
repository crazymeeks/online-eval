<?php

namespace App\Http\Controllers\Admin;

use App;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    

    public function loginView(Request $request)
    {
        
    	return view('admin.pages.login.login');
    }

    /**
     * Authenticate user for login
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postAuthenticate(Request $request)
	{

		if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

			return redirect('/admin');
		}
        return ['dd'];
	}
}
