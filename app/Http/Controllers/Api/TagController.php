<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TagController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $tags = Tag::withCount('posts')->get();

        return TagResource::collection($tags);
    }

    public function show(Tag $tag): TagResource
    {
        return new TagResource($tag);
    }
}
