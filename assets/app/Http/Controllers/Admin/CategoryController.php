<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function index()
	{
		$pageTitle  = "All Categories";
		$categories = Category::searchable(['name'])->orderBy('name')->paginate(getPaginate());
		return view('admin.category.index', compact('pageTitle', 'categories'));
	}
	public function create()
	{
		$pageTitle = "Create Category";
		return view('admin.category.create', compact('pageTitle'));
	}

	public function store(Request $request, $id = 0)
	{
		$request->validate([
			"name"        => 'required|max:40',
			"description" => 'required',
			'image'       => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
		]);

		if ($id) {
			$category = Category::findOrFail($id);
			$message  = "Category update successfully";
		} else {
			$category = new Category();
			$message  = "Category added successfully";
		}

		if ($request->hasFile('image')) {
			try {
				$old             = $category->image;
				$category->image = fileUploader($request->image, getFilePath('category'), getFileSize('category'), $old);
			} catch (\Exception $exp) {
				$notify[] = ['error', 'Couldn\'t upload your image'];
				return back()->withNotify($notify);
			}
		}

		$category->name        = $request->name;
		$category->description = $request->description;
		$category->save();
		$notify[] = ["success", $message];
		return back()->withNotify($notify);
	}

	public function edit($id)
	{
		$pageTitle = "Edit Category";
		$category  = Category::findOrFail($id);
		return view('admin.category.create', compact('category', 'pageTitle'));
	}

	public function status($id)
	{
		return Category::changeStatus($id);
	}

	public function featured($id)
	{
		$category           = Category::findOrFail($id);
		$category->featured = $category->featured ? Status::NO : Status::YES;
		$category->save();
		$notify[] = ["success", "Category featured status updated"];
		return back()->withNotify($notify);
	}
}
