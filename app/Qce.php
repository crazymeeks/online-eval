<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qce extends Model
{

	use SoftDeletes;

	protected $table = 'qce';

	protected $fillable = array(
		'appendix', 'nbc_number',
		'description'
	);

	protected $dates = ['deleted_at'];


	public function qce_categories()
	{
		return $this->hasMany('App\QceCategory');
	}
}
