<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('admin.change_password');
    }

    public function store(Request $request, User $model)
    {
        $email = Auth::user()->email;
        $user = $model->query()->where('email', '=', $email)->firstOrFail();

        $request->validate([
            'pass' => ['required', 'min:8'],
            'repeat_pass' => ['required', 'min:8'],
        ]);

        if($request->input('pass') === $request->input('repeat_pass')){
            $user->password = bcrypt($request->input('pass'));
            $user->save();

            return redirect()->back()->with('success', 'Password has been updated');
        }

        return redirect()->back()->with('error', 'Password has not been updated');
    }
}
