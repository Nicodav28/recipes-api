<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::with('recipes.category', 'recipes.tags', 'recipes.user')->get());
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Category $category)
    {
        $category = $category->load('recipes.category', 'recipes.tags', 'recipes.user');
        return new CategoryResource($category);
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(Category $recipe)
    {
        //
    }
}
