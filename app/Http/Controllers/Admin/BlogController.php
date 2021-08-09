<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Blog $model)
    {
        $blogs = $model->query()->orderBy('updated_at', 'desc')->get();

        return view('admin.blog.index')->with(compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request, Blog $model): RedirectResponse
    {
        $request->validate([
            'title' => ['required'],
            'subtitle' => ['required'],
            'text' => ['required'],
            'image' => ['required'],
        ]);

        $path = 'uploads/images/' . substr(strrchr(static::class, '\\'), 1) . '/' . Carbon::now()->toDateString();
        $fullPath = $request->file('image')->store($path, 'public');
        $model->image = "storage/" . $fullPath;

        $model->title = $request->input('title');
        $model->subtitle = $request->input('subtitle');
        $model->text = $request->input('text');

        $model->save();

        return redirect()->back()->with('success', 'Element has been created');
    }

    public function show(Blog $model, $id)
    {
        $blog = $model->query()->findOrFail($id);

        return view('admin.blog.show')->with(compact('blog'));
    }

    public function edit(Blog $model,$id)
    {
        $blog = $model->query()->findOrFail($id);

        return view('admin.blog.edit')->with(compact('blog'));
    }

    public function update(Request $request, Blog $model, $id): RedirectResponse
    {
        $request->validate([
            'title' => ['required'],
            'subtitle' => ['required'],
            'text' => ['required'],
        ]);

        $blog = $model->findOrFail($id);

        if($request->hasFile('image')){
            unlink($blog->image);

            $path = 'uploads/images/' . substr(strrchr(static::class, '\\'), 1) . '/' . Carbon::now()->toDateString();
            $fullPath = $request->file('image')->store($path, 'public');
            $blog->image = "storage/" . $fullPath;
        }

        $blog->title = $request->input('title');
        $blog->subtitle = $request->input('subtitle');
        $blog->text = $request->input('text');

        $blog->save();

        return redirect()->back()->with('success', 'Element has been updated successfully');
    }

    public function destroy(Blog $model, $id): RedirectResponse
    {
        $blog = $model->findOrFail($id);

        if(!file_exists($blog->image)){
            $model->findOrFail($id)->delete();

            return redirect()->route('blog.index')->with('success', 'News have been deleted');
        }

        unlink($blog->image);
        $model->findOrFail($id)->delete();

        return redirect()->route('blog.index')->with('success', 'News have been deleted');
    }
}
