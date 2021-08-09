<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Models\HomePageDepartment;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(HomePageDepartment $model)
    {
        $departments = $model->query()->orderBy('updated_at', 'desc')->get();

        return view('admin.home_page.department.index')->with(compact('departments'));
    }

    public function create()
    {
        return view('admin.home_page.department.create');
    }

    public function store(Request $request, HomePageDepartment $model): RedirectResponse
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

    public function show(HomePageDepartment $model, $id)
    {
        $department = $model->query()->findOrFail($id);

        return view('admin.home_page.department.show')->with(compact('department'));
    }

    public function edit(HomePageDepartment $model,$id)
    {
        $department = $model->query()->findOrFail($id);

        return view('admin.home_page.department.edit')->with(compact('department'));
    }

    public function update(Request $request, HomePageDepartment $model, $id): RedirectResponse
    {
        $request->validate([
            'title' => ['required'],
            'subtitle' => ['required'],
            'text' => ['required'],
        ]);

        $department = $model->findOrFail($id);

        if($request->hasFile('image')){
            unlink($department->image);

            $path = 'uploads/images/' . substr(strrchr(static::class, '\\'), 1) . '/' . Carbon::now()->toDateString();
            $fullPath = $request->file('image')->store($path, 'public');
            $department->image = "storage/" . $fullPath;
        }

        $department->title = $request->input('title');
        $department->subtitle = $request->input('subtitle');
        $department->text = $request->input('text');

        $department->save();

        return redirect()->back()->with('success', 'Element has been updated successfully');
    }

    public function destroy(HomePageDepartment $model, $id): RedirectResponse
    {
        $department = $model->findOrFail($id);

        if(!file_exists($department->image)){
            $model->findOrFail($id)->delete();

            return redirect()->route('home-page-department.index')->with('success', 'News have been deleted');
        }

        unlink($department->image);
        $model->findOrFail($id)->delete();

        return redirect()->route('home-page-department.index')->with('success', 'News have been deleted');
    }
}
