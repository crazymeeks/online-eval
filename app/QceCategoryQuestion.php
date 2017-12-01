<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QceCategoryQuestion extends Model
{
    
    protected $fillable = array(
    	'qce_category_id', 'description',
    	'sort_order',
    );

    public function qce_category()
    {
    	return $this->belongsTo('App\QceCategory');
    }
}
