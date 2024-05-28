<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function manage() {
        $categories = Category::all();
        return view('categories.manage', compact('categories'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'names' => 'required|max:255|unique:categories',
            'description' => 'required|string',
        ]);

        $category = new Category([
            'names' => $validatedData['names'],
            'description' => $validatedData['description'],
        ]);

        $user = Auth::user();

        $category['created_by'] = $user->getAuthIdentifier();
        $category['updated_by'] = $user->getAuthIdentifier();

        $category->save();

        $request->session()->flash('success', 'Category created successfully!');

        return redirect('/categories/create');


    }

    public function edit(Category $category) {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category) {
        $validator = Validator::make($request->all(), [
            'names'=> ['required', Rule::unique('categories')->ignore($category->id),],
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $category->update($request->all());

        return redirect('/categories/manage');
    }

    public function destroy(Category $category): \Illuminate\Http\RedirectResponse
    {
        $category->delete();
        return redirect()->route('categories.manage')->with('success', 'Category deleted successfully.');
    }
}
