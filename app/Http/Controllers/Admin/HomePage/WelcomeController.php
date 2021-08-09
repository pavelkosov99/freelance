<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Models\HomePageWelcome;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(HomePageWelcome $model)
    {
        $welcome = $model->query()->where('id', 1)->get();

        return view('admin.home_page.welcome.index')->with(compact('welcome'));
    }

    public function store(HomePageWelcome $model, Request $request): RedirectResponse
    {
        $path = 'uploads/images/' . substr(strrchr(static::class, '\\'), 1) . '/' . Carbon::now()->toDateString();

        $welcome = $model->query()->firstOrFail();

        if ($welcome->count() > 0) {
            $request->validate([
                'title' => ['required'],
                'subtitle' => ['required'],
                'text' => ['required'],
            ]);

            if($request->hasFile('image')){
                unlink($welcome->image);
                $fullPath = $request->file('image')->store($path, 'public');
                $welcome->image = "storage/" . $fullPath;
            }

            $welcome->title = $request->input('title');
            $welcome->subtitle = $request->input('subtitle');
            $welcome->text = $request->input('text');

            $welcome->save();

            return redirect()->back()->with('success', 'Element has been updated successfully');
        }

        $request->validate([
            'title' => ['required'],
            'subtitle' => ['required'],
            'text' => ['required'],
            'image' => ['required'],
        ]);

        $fullPath = $request->file('image')->store($path, 'public');
        $model->image = "storage/" . $fullPath;

        $model->title = $request->input('title');
        $model->subtitle = $request->input('subtitle');
        $model->text = $request->input('text');

        $model->save();

        return redirect()->back()->with('success', 'Element has been created');
    }
}
