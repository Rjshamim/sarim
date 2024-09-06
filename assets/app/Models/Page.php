<?php

namespace App\Models;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

	public function scopeNotDefault($query)
	{
		return $query->where('is_default', Status::NO);
	}
}