<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QceCategory extends Model
{

    protected $fillable = array(
    	'qce_id', 'category', 'index',
    );

    public function qce()
    {
    	return $this->belongsTo('App\Qce');
    }

    public function qce_category_questions()
    {
    	return $this->hasMany('App\QceCategoryQuestion');
    }
}
