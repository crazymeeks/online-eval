<?php

namespace App\Http\Controllers\Admin;

use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Traits;

class QceController extends Controller
{

    use Traits\QceCategoryTrait, Traits\QceCategoryQuestionTrait;
    
	public function __construct()
    {
    	$this->pageContentTitle = array_merge(['qce' => 'active'], $this->setPageContentTitle('QCE', 'Add new'));

    }

    /**
	 * Display index view of QCE
	 * 
	 * @param  Request $request
	 * 
	 * @return \Illuminate\Http\Response
	 */
    public function addFormView(Request $request)
    {

    	$data = [];

    	$data = array_merge($data, $this->pageContentTitle);

    	return view('admin.pages.qce.addnew', $data);
    }

    /**
     * Add new QCE
     * 
     * @param Request $request
     *
     * @return  Illuminate\Http\Response
     */
    public function addNew(Request $request)
    {
        $this->validate($request, [
            'nbc_number' => 'required'
        ], ['nbc_number.required' => 'The NBC number is required']);

        App\Qce::create($request->all());

        return redirect()->back()->with('success', 'New QCE has been saved.');
    }

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

    /**
     * Display QCE "Add new category" page
     * 
     * @param  Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function qceCategoryView(Request $request)
    {

        $qce = App\Qce::all();

        $this->pageContentTitle = $this->setPageContentTitle('QCE', 'Add new category');
        $data = ['qce' => $qce];

        $data = array_merge($data, $this->pageContentTitle);

        return view('admin.pages.qce.category.addnew', $data);
    }

    /**
     * Display QCE "Add new question" page
     *
     * @param  \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function qceCategoryQuestionView(Request $request)
    {

        $categories = App\QceCategory::all();

        $this->pageContentTitle = array_merge($this->pageContentTitle,$this->setPageContentTitle('QCE', 'Add new question'));

        $data = ['categories' => $categories];

        $data = array_merge($data, $this->pageContentTitle);

        return view('admin.pages.qce.category.question.addnew', $data);
    }

    /**
     * This method will determine following:
     * - create new category
     * - update category
     * - delete category
     *
     * Then route it to appropriate action
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return  \Illuminate\Http\Response
     */
    public function modifyCategoryResource(Request $request)
    {
        if (strtolower($request->action) === 'create') {
            return $this->createNewCategory($request);
        }
    }

    /**
     * This method will determine the following for QCE category Question
     * - create new question of category
     * - update new question of category
     * - delete question of category
     *
     * Then route it to appropriate action
     *
     * @param  \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function modifyCategoryQuestionResource(Request $request)
    {
        if (strtolower($request->action) === 'create') {
            return $this->createNewCategoryQuestion($request);
        }
    }

}
