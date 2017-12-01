<?php

namespace App\Http\Controllers\Admin\Traits;

use App;
use Illuminate\Http\Request;

trait QceCategoryQuestionTrait
{
	

	/**
	 * Create a QCE question for category
	 * 
	 * @param  \Illuminate\Http\Request $request
	 * 
	 * @return \Illuminate\Http\Response
	 */
	private function createNewCategoryQuestion(Request $request)
	{
		$this->validate($request, [
			'qce_category_id' => 'required|integer',
			'description'     => 'required',
		], ['qce_category_id.required' => 'Category is required']);

		App\QceCategoryQuestion::create($request->all());

		return redirect()->back()->with('success', 'The question for category has been saved.');
	}
}