<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:user list'])->only('index');
        $this->middleware(['permission:create user'])->only('create');
        $this->middleware(['permission:edit user'])->only('edit');
        $this->middleware(['permission:delete user'])->only('destroy');
    }
    public function index()
    {
        $users = User::with('roles')->latest()->get();
        
        return view('backend.pages.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::latest()->get();
        return view('backend.pages.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ])->syncRoles($request->role);

        return redirect()->route('users.index');
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
            'email' => $request->email,
        ];
        $user->update($data);

        $user->syncRoles($request->role);
        return redirect()->route('users.index');
    }
}
