<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Resources\TagResource;
use Symfony\Component\HttpFoundation\Response;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::with('recipes.category', 'recipes.tags', 'recipes.user')->get();

        return TagResource::collection($tags);
    }

    public function store(Request $request)
    {
        $tag = Tag::create($request->all());

        return response()->json(new TagResource($tag), Response::HTTP_CREATED);
    }

    public function show(Tag $tag)
    {
        $tag = $tag->load('recipes.category', 'recipes.tags', 'recipes.user');

        return new TagResource($tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());

        return response()->json(new TagResource($tag), Response::HTTP_OK);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
