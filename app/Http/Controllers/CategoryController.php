<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string|alpha|unique:categories'
        ]);

        Category::create($formFields);
        return redirect('/categories/new')->with('message', 'Category added successfully');
    }
}
