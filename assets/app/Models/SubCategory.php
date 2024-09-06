<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
	use Searchable, GlobalStatus;

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function posts()
	{
		return $this->hasMany(JobPost::class, 'subcategory_id');
	}
}