<?php

namespace App\Http\Controllers\Admin\Traits;

use Illuminate\Http\Request;
use App;
trait QceCategoryTrait
{
	private function createNewCategory(Request $request)
	{
		$this->validate($request, [
			'category' => 'required',
		], ['category.required' => 'The QCE category is required']);

		App\QceCategory::create($request->all());

		return redirect()->back()->with('success', 'New Category has been added');

	}
}