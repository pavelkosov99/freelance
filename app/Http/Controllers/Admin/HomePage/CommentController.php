<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Models\HomePageComment;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index(HomePageComment $model)
    {
        $comments = $model->query()->orderBy('updated_at', 'desc')->get();

        return view('admin.home_page.comment.index')->with(compact('comments'));
    }

    public function create()
    {
        return view('admin.home_page.comment.create');
    }

    public function store(Request $request, HomePageComment $model): RedirectResponse
    {
        $request->validate([
            'title' => ['required'],
            'commentator' => ['required'],
            'text' => ['required'],
            'image' => ['required'],
        ]);

        $path = 'uploads/images/' . substr(strrchr(static::class, '\\'), 1) . '/' . Carbon::now()->toDateString();
        $fullPath = $request->file('image')->store($path, 'public');
        $model->image = "storage/" . $fullPath;

        $model->title = $request->input('title');
        $model->commentator = $request->input('commentator');
        $model->text = $request->input('text');

        $model->save();

        return redirect()->back()->with('success', 'Element has been created');
    }

    public function show(HomePageComment $model, $id)
    {
        $comment = $model->query()->findOrFail($id);

        return view('admin.home_page.comment.show')->with(compact('comment'));
    }

    public function edit(HomePageComment $model,$id)
    {
        $comment = $model->query()->findOrFail($id);

        return view('admin.home_page.comment.edit')->with(compact('comment'));
    }

    public function update(Request $request, HomePageComment $model, $id): RedirectResponse
    {
        $request->validate([
            'title' => ['required'],
            'commentator' => ['required'],
            'text' => ['required'],
        ]);

        $comment = $model->findOrFail($id);

        if($request->hasFile('image')){
            unlink($comment->image);

            $path = 'uploads/images/' . substr(strrchr(static::class, '\\'), 1) . '/' . Carbon::now()->toDateString();
            $fullPath = $request->file('image')->store($path, 'public');
            $comment->image = "storage/" . $fullPath;
        }

        $comment->title = $request->input('title');
        $comment->commentator = $request->input('commentator');
        $comment->text = $request->input('text');

        $comment->save();

        return redirect()->back()->with('success', 'Element has been updated successfully');
    }

    public function destroy(HomePageComment $model, $id): RedirectResponse
    {
        $comment = $model->findOrFail($id);

        if(!file_exists($comment->image)){
            $model->findOrFail($id)->delete();

            return redirect()->route('home-page-comment.index')->with('success', 'News have been deleted');
        }

        unlink($comment->image);
        $model->findOrFail($id)->delete();

        return redirect()->route('home-page-comment.index')->with('success', 'News have been deleted');
    }
}
