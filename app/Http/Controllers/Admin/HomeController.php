<?php

namespace App\Http\Controllers\Admin;

use App;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    protected $user;

    public function __construct(App\User $user)
    {
    	$this->pageContentTitle = $this->setPageContentTitle('Dashboard', 'RSU Online Evaluation');

        $this->user = $user;
    }

	/**
	 * Display index view of Admin dashboard
	 * 
	 * @param  Request $request
	 * 
	 * @return \Illuminate\Http\Response
	 */
    public function indexView(Request $request)
    {
        
        
        $data = [
                    'user' => 'test',
                ];

        //return $this->user->canDo(['evaluate', 'mark-validates']);
        // if ($this->user->canDo(['evaluate', 'mark-validate'])) {
        //     return ['yes'];
        // }
        // return ['no'];

        if(App\User::hasRole(['admin'])){
            $data = array_merge($data, $this->pageContentTitle);

            return view('admin.pages.dashboard.index', $data);
        }

    }
}
