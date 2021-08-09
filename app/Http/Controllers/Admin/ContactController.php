<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Contact $model)
    {
        $contact = $model->query()->where('id', 1)->get();

        return view('admin.contact')->with(compact('contact'));
    }

    public function store(Contact $model, Request $request): RedirectResponse
    {
        $request->validate([
            'address' => ['required'],
            'map' => ['required'],
            'phone' => ['required'],
            'whatsapp' => ['required'],
            'instagram' => ['required'],
            'facebook' => ['required'],
            'mail' => ['required'],
        ]);

        $model->updateOrCreate(
            [
                'id' => 1
            ],
            [
                'address' => $request->input('address'),
                'map' => $request->input('map'),
                'phone' => $request->input('phone'),
                'whatsapp' => $request->input('whatsapp'),
                'instagram' => $request->input('instagram'),
                'facebook' => $request->input('facebook'),
                'mail' => $request->input('mail'),
            ]
        );

        return redirect()->back()->with('success', 'Element has been updated');
    }
}
