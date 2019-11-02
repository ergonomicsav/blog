<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    }

    public function store(UserUpdateRequest $request)
    {
        $user = Auth::user();

        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->back()->with('status', 'Провиль успешно обновлен.');
    }
}
