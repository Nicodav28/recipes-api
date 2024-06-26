<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recipe;

use App\Http\Resources\RecipeResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreRecipeRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RecipeController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return RecipeResource::collection(Recipe::with('category', 'tags', 'user')->get());
    }

    public function store(StoreRecipeRequest $request)
    {
        $recipe = $request->user()->recipes()->create($request->all());
        $recipe->tags()->attach(json_decode($request->tags));

        $recipe->image = $request->file('image')->store('recipes', 'public');
        $recipe->save();

        return response()->json(new RecipeResource($recipe), Response::HTTP_CREATED);
    }

    public function show(Recipe $recipe)
    {
        $recipe = $recipe->load('category', 'tags', 'user');

        return new RecipeResource($recipe);
    }

    public function update(StoreRecipeRequest $request, Recipe $recipe)
    {
        $this->authorize('update', $recipe);
        $recipe->update($request->all());
        $tags = json_decode($request->tags);

        if ($tags) {
            $recipe->tags()->sync($tags);
        }

        if ($request->file('image')) {
            $recipe->image = $request->file('image')->store('recipes', 'public');
            $recipe->save();
        }

        return response()->json(new RecipeResource($recipe), Response::HTTP_OK);
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
