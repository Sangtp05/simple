<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\BreadcrumbService;

class PostController extends Controller
{
    protected $breadcrumbService;

    public function __construct(BreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }

    public function index()
    {
        $latestPosts = Post::latest()->take(5)->get();
        $posts = Post::where('type', 'post')->latest()->paginate(6);
        $fashionPosts = Post::where('type', 'fashion')->latest()->paginate(6);
        $simplePosts = Post::where('type', 'simple')->latest()->paginate(6);
        $this->breadcrumbService->add('Tin tức', route('posts.index'));
        return view('posts.index', compact('latestPosts', 'posts', 'fashionPosts', 'simplePosts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $relatedPosts = Post::where('type', $post->type)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();
        $this->breadcrumbService->add('Tin tức', route('posts.index'));
        $this->breadcrumbService->add($post->name);

        return view('posts.show', compact('post', 'relatedPosts'));
    }
} 