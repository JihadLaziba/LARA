<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create(Request $request)
{
   
    return view('categories.create');
 
}
public function update(Request $request, $id)
{
    $data = $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);

    $category = Categorie::findOrFail($id);
    $category->update($data);
    return redirect()->route('categories.index')->with('success', 'Category updated successfully.');

    // Optionally, you can return a response or redirect to another page.
}
public function delete($id)
{
    $category = Categorie::findOrFail($id);
    $category->delete();
    return redirect()->route('categories.index')
                        ->with('success','Product deleted successfully');
    

    // Optionally, you can return a response or redirect to another page.
}
public function index()
{
    $categories = Categorie::all();
    return view('categories.index',compact('categories'));
    // Optionally, you can return a response or pass the $categories variable to your view.
}
public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);

    Categorie::create($data);

    return redirect()->route('categories.index')->with('success', 'Category created successfully.');
}
public function edit(Categorie $category)
{
    return view('categories.edit', compact('category'));
}
}
