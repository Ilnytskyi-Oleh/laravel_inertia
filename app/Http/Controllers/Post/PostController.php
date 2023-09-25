<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    /**
     * @return Response
     */
    public function index() {
        return Inertia::render('Post/Index');
    }

    public function create() {
        return Inertia::render('Post/Create');
    }

    public function store(StorePostRequest $request) {
        $data = $request->validated();

        $post = Post::create($data);

        return Inertia::render('Post/Index', [
            'post' => $post,
        ]);
    }
}
