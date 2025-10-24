<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'categoryName' => 'required|string|max:255',
        ]);

        Category::create($validated);

        return redirect()->back()->with('success', 'Category added successfully!');

        // $category = new Category();
        // $category->name = 'Technology';
        // $category->save();

    }
}
