<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

use App\Http\Resources\RecipeResource;

class RecipeController extends Controller
{
    public function index()
    {
        return RecipeResource::collection(Recipe::with('category', 'tags', 'user')->get());
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Recipe $recipe)
    {
        $recipe = $recipe->load('category', 'tags', 'user');

        return new RecipeResource($recipe);
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(Recipe $recipe)
    {
        //
    }
}
