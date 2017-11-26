<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QceController extends Controller
{
    
	public function __construct()
    {
    	
    }

    /**
	 * Display index view of QCE
	 * 
	 * @param  Request $request
	 * 
	 * @return \Illuminate\Http\Response
	 */
    /*public function indexView(Request $request)
    {

    	$data = [];

    	$data = array_merge($data, $this->pageContentTitle);

    	return view('admin.pages.qce.index', $data);
    }*/

    /**
	 * Display Research view of QCE
	 * 
	 * @param  Request $request
	 * 
	 * @return \Illuminate\Http\Response
	 */
    public function researchView(Request $request)
    {

    	$this->pageContentTitle = $this->setPageContentTitle('QCE', 'Research');

    	$data = [];

    	$data = array_merge($data, $this->pageContentTitle);

    	return view('admin.pages.qce.research', $data);
    }

    

}
