<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->latest()->get();;
        return view('backend.pages.user.index', compact('users'));
    }

    /**
     * Summary of edit
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $role = Role::latest()->get();
        $data = $user->roles->pluck('id')->toArray();
        return view('backend.pages.user.edit', compact('user', 'role', 'data'));
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        $user = User::findOrFail($id);
        $data = [
            'name' => $request->name,
            'email' => $request->name,
        ];
        $user->update($data);

        $user->syncRoles($request->role);
        return redirect()->route('users.index');
    }
}
