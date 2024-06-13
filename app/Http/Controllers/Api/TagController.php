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
        return TagResource::collection(Tag::with('recipes')->get());
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Tag $tag)
    {
        $tag = $tag->load('recipes');

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
