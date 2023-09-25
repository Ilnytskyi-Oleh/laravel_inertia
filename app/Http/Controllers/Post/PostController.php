<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
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
}
