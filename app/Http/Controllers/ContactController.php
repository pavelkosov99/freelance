<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Contact $model)
    {
        $contact = $model->query()->firstOrFail();

        return view('pages.contact')->with(compact('contact'));
    }
}
