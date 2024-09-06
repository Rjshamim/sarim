<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\Transaction;
use App\Models\User;

class JobController extends Controller
{
	public function index()
	{
		$pageTitle = "All Jobs";
		$jobs      = $this->jobData();
		return view('admin.jobs.index', compact('pageTitle', 'jobs'));
	}
	public function pending()
	{
		$pageTitle = "Pending Jobs";
		$jobs      = $this->jobData('pending');
		return view('admin.jobs.index', compact('pageTitle', 'jobs'));
	}
    public function approved()
	{
		$pageTitle = "Approve Jobs";
		$jobs      = $this->jobData('approved');
		return view('admin.jobs.index', compact('pageTitle', 'jobs'));
	}

	public function complete()
	{
		$pageTitle = "Completed Jobs";
		$jobs      = $this->jobData('completed');
		return view('admin.jobs.index', compact('pageTitle', 'jobs'));
	}

	public function rejected()
	{
		$pageTitle = "Rejected Jobs";
		$jobs      = $this->jobData('rejected');
		return view('admin.jobs.index', compact('pageTitle', 'jobs'));
	}

	protected function jobData($scope = null)
	{
		if ($scope) {
			$jobs = JobPost::$scope();
		} else {
			$jobs = JobPost::query();
		}
		return $jobs->searchable(['category:name', 'user:username', 'title', 'job_code'])->filter(['user_id'])->with('user')->orderBy('id', 'desc')->paginate(getPaginate());
	}

	public function view($id)
	{
		$pageTitle = "Job Information";
		$job       = JobPost::where('id', $id)->with('user')->first();
		return view('admin.jobs.view', compact('pageTitle', 'job'));
	}

	public function approve($id)
	{
		$job         = JobPost::pending()->findOrFail($id);
		$job->status = Status::JOB_APPROVED;
		$job->save();

		notify($job->user, 'ADMIN_JOB_APPROVE', [
			'posted_by' => $job->user->username,
			'job_code'  => $job->job_code,
			'quantity'  => $job->quantity,
			'amount'    => showAmount($job->rate),
			'total'     => showAmount($job->total),
		]);

		$notify[] = ['success', 'Job approved successfully'];
		return to_route('admin.jobs.pending')->withNotify($notify);
	}

	public function reject($id)
	{
		$job         = JobPost::pending()->findOrFail($id);
		$job->status = Status::JOB_REJECTED;
		$job->save();

		$jobBalance  = $job->total;

		$user = User::active()->where('id', $job->user_id)->firstOrFail();
		$user->balance += $jobBalance;
		$user->save();

		$transaction               = new Transaction();
		$transaction->user_id      = $user->id;
		$transaction->amount       = $jobBalance;
		$transaction->post_balance = $user->balance;
		$transaction->trx_type     = '+';
		$transaction->details      = 'Refund for ' . $job->title;
		$transaction->trx          = $job->job_code;
		$transaction->remark       = 'job_rejected';
		$transaction->save();

		notify($job->user, 'ADMIN_JOB_REJECT', [
			'posted_by' => $job->user->username,
			'job_code'  => $job->job_code,
			'quantity'  => $job->quantity,
			'amount'    => showAmount($job->rate),
			'total'     => showAmount($job->total),
		]);

        $notify[] = ['success', 'Job rejected successfully'];
		return to_route('admin.jobs.pending')->withNotify($notify);
	}

	public function details($id)
	{
		$pageTitle = "Job Request Details";
		$job       = JobPost::where('id', $id)->with('proves.user')->firstOrFail();
		return view('admin.jobs.details', compact('pageTitle', 'job'));
	}
}
