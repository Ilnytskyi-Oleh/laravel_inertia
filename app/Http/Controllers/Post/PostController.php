<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        $posts = PostResource::collection(Post::all())->resolve();
        return Inertia::render('Post/Index', compact('posts'));
    }

    public function show(Post $post): Response
    {
        return Inertia::render('Post/Show', compact('post'));
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Post/Create');
    }

    public function edit(Post $post)
    {
        return Inertia::render('Post/Edit', compact('post'));
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $post->update($request->validated());
        $post->refresh();

        return redirect()->route('post.edit', $post)->with('message', 'Updated!');
    }


    public function store(StorePostRequest $request) {
        $data = $request->validated();

        $post = Post::create($data);

        return redirect()->route('post.index');
    }

    public function delete(Post $post) {
        $post->delete();

        return redirect()->route('post.index');
    }
}
