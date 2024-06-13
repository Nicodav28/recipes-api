<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Resources\TagResource;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::with('recipes.category', 'recipes.tags', 'recipes.user')->get();

        return TagResource::collection($tags);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Tag $tag)
    {
        $tag = $tag->load('recipes.category', 'recipes.tags', 'recipes.user');

        return new TagResource($tag);
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(Tag $recipe)
    {
        //
    }
}
