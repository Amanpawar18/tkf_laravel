<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('backend.user.view', compact('user'));
    }

    public function edit(User $user)
    {
        return view('backend.user.edit', compact('user'));
    }

    public function update(User $user)
    {
        $user->update(request()->all());
        return redirect()->route('admin.user.index')->with('status', 'User updated successfully !!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('status', 'User deleted successfully !!');
    }
}
