<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Models\HomePageSpeciality;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function index(HomePageSpeciality $model)
    {
        $speciality = $model->query()->where('id', 1)->get();

        return view('admin.home_page.speciality.index')->with(compact('speciality'));
    }

    public function store(HomePageSpeciality $model, Request $request): RedirectResponse
    {
        $request->validate([
            'title_1' => ['required'],
            'subtitle_1' => ['required'],
            'title_2' => ['required'],
            'subtitle_2' => ['required'],
            'title_3' => ['required'],
            'subtitle_3' => ['required'],
        ]);

        $model->updateOrCreate(
            [
                'id' => 1
            ],
            [
                'title_1' => $request->input('title_1'),
                'subtitle_1' => $request->input('subtitle_1'),
                'title_2' => $request->input('title_2'),
                'subtitle_2' => $request->input('subtitle_2'),
                'title_3' => $request->input('title_3'),
                'subtitle_3' => $request->input('subtitle_3'),
            ]
        );

        return redirect()->back()->with('success', 'Element has been updated');
    }
}
