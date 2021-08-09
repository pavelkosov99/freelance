<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Models\HomePageExpert;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function index(HomePageExpert $model)
    {
        $experts = $model->query()->orderBy('updated_at', 'desc')->get();

        return view('admin.home_page.expert.index')->with(compact('experts'));
    }

    public function create()
    {
        return view('admin.home_page.expert.create');
    }

    public function store(Request $request, HomePageExpert $model): RedirectResponse
    {
        $request->validate([
            'title' => ['required'],
            'subtitle' => ['required'],
            'image' => ['required'],
        ]);

        $path = 'uploads/images/' . substr(strrchr(static::class, '\\'), 1) . '/' . Carbon::now()->toDateString();
        $fullPath = $request->file('image')->store($path, 'public');
        $model->image = "storage/" . $fullPath;

        $model->title = $request->input('title');
        $model->subtitle = $request->input('subtitle');

        $model->save();

        return redirect()->back()->with('success', 'Element has been created');
    }

    public function show(HomePageExpert $model, $id)
    {
        $expert = $model->query()->findOrFail($id);

        return view('admin.home_page.expert.show')->with(compact('expert'));
    }

    public function edit(HomePageExpert $model,$id)
    {
        $expert = $model->query()->findOrFail($id);

        return view('admin.home_page.expert.edit')->with(compact('expert'));
    }

    public function update(Request $request, HomePageExpert $model, $id): RedirectResponse
    {
        $request->validate([
            'title' => ['required'],
            'subtitle' => ['required'],
        ]);

        $expert = $model->findOrFail($id);

        if($request->hasFile('image')){
            unlink($expert->image);

            $path = 'uploads/images/' . substr(strrchr(static::class, '\\'), 1) . '/' . Carbon::now()->toDateString();
            $fullPath = $request->file('image')->store($path, 'public');
            $expert->image = "storage/" . $fullPath;
        }

        $expert->title = $request->input('title');
        $expert->subtitle = $request->input('subtitle');

        $expert->save();

        return redirect()->back()->with('success', 'Element has been updated successfully');
    }

    public function destroy(HomePageExpert $model, $id): RedirectResponse
    {
        $expert = $model->findOrFail($id);

        if(!file_exists($expert->image)){
            $model->findOrFail($id)->delete();

            return redirect()->route('home-page-expert.index')->with('success', 'News have been deleted');
        }

        unlink($expert->image);
        $model->findOrFail($id)->delete();

        return redirect()->route('home-page-expert.index')->with('success', 'News have been deleted');
    }
}
