<?php

namespace App\Models;

use App\Constants\Status;
use App\Traits\GlobalStatus;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use Searchable, GlobalStatus;

	public function subcategory()
	{
		return $this->hasMany(SubCategory::class);
	}

	public function jobPosts()
	{
		return $this->hasMany(JobPost::class);
	}
	public function scopeFeatured($query)
	{
		return $query->where('featured', Status::YES);
	}
}