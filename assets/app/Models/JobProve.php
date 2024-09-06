<?php

namespace App\Models;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Model;

class JobProve extends Model
{

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function job()
	{
		return $this->belongsTo(JobPost::class, 'job_post_id');
	}

	public function scopePending($query)
	{
		return $query->where('status', Status::JOB_PROVE_PENDING);
	}

	public function scopeApprove($query)
	{
		return $query->where('status', Status::JOB_PROVE_APPROVE);
	}

	public function scopeRejected($query)
	{
		return $query->where('status', Status::JOB_PROVE_REJECT);
	}
}
