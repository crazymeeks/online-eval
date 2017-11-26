<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $pageContentTitle =  array();

    /**
     * Set the Page Content Title
     * 
     * @param string $page_title
     * @param string $page_help_text
     *
     * @return  array
     */
    protected function setPageContentTitle($page_title, $page_help_text = null)
    {
    	return $data = [
    		'page_title' => $page_title,
    		'page_help_text' => $page_help_text
    	];
    }
}
