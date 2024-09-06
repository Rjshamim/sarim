<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FileType;
use Illuminate\Http\Request;

class FileTypeController extends Controller
{
	public function index()
	{
		$pageTitle = "Manage File Type";
		$files     = FileType::searchable(['name'])->orderBy('name')->paginate(getPaginate());
		return view('admin.file.index', compact('pageTitle', 'files'));
	}

	public function store(Request $request,$id=0)
	{
		$request->validate([
			"name" => 'required|unique:file_types,name,' . $id,
		]);

		if ($id) {
			$fileType = FileType::findOrFail($id);
			$message  = "File type updated successfully";
		} else {
			$fileType = new FileType();
			$message  = "File type created successfully";
		}

		$fileType->name = $request->name;
		$fileType->save();
        
		$notify[] = ["success", $message];
		return back()->withNotify($notify);
	}

	public function status($id)
	{
		return FileType::changeStatus($id);
	}
}
