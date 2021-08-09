<?php

namespace App\Http\Controllers;


use App\Models\Blog;

class BlogController extends Controller
{
    public function index(Blog $model)
    {
        $posts = $model->query()->orderBy('created_at', 'desc')->paginate(3);

        return view('pages.blog.index')->with(compact('posts'));
    }

    public function show(Blog $model, $id)
    {
        $blog = $model->query()->findOrFail($id);

        return view('pages.blog.show')->with(compact('blog'));
    }
}
