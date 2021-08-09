<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Models\HomePageSlider;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    public function index(HomePageSlider $model)
    {
        $sliders = $model->query()->orderBy('updated_at', 'desc')->get();

        return view('admin.home_page.slider.index')->with(compact('sliders'));
    }

    public function create()
    {
        return view('admin.home_page.slider.create');
    }

    public function store(Request $request, HomePageSlider $model): RedirectResponse
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

    public function show(HomePageSlider $model, $id)
    {
        $slide = $model->query()->findOrFail($id);

        return view('admin.home_page.slider.show')->with(compact('slide'));
    }

    public function edit(HomePageSlider $model,$id)
    {
        $slide = $model->query()->findOrFail($id);

        return view('admin.home_page.slider.edit')->with(compact('slide'));
    }

    public function update(Request $request, HomePageSlider $model, $id): RedirectResponse
    {
        $request->validate([
            'title' => ['required'],
            'subtitle' => ['required'],
        ]);

        $slide = $model->findOrFail($id);

        if($request->hasFile('image')){
            unlink($slide->image);

            $path = 'uploads/images/' . substr(strrchr(static::class, '\\'), 1) . '/' . Carbon::now()->toDateString();
            $fullPath = $request->file('image')->store($path, 'public');
            $slide->image = "storage/" . $fullPath;
        }

        $slide->title = $request->input('title');
        $slide->subtitle = $request->input('subtitle');

        $slide->save();

        return redirect()->back()->with('success', 'Element has been updated successfully');
    }

    public function destroy(HomePageSlider $model, $id): RedirectResponse
    {
        $slide = $model->findOrFail($id);

        if(!file_exists($slide->image)){
            $model->findOrFail($id)->delete();

            return redirect()->route('home-page-slider.index')->with('success', 'News have been deleted');
        }

        unlink($slide->image);
        $model->findOrFail($id)->delete();

        return redirect()->route('home-page-slider.index')->with('success', 'News have been deleted');
    }
}
