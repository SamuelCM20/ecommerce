<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\UserRequest;
use App\Http\Requests\user\UserUpdateRequest;
use App\Http\Traits\UploadFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use UploadFile;

    public function index(Request $request)
    {
        $roles = Role::get();
        $users = User::with('roles', 'file')->get();
        if (!$request->ajax()) return view('users.index', compact('users', 'roles'));
        return response()->json(['users' => $users], 200); //view
    }
    public function profile()
    {
        $user = Auth::user();
        $userWithFile = User::with('file')->find($user->id);
        return view('users.profile', compact('user', 'userWithFile'));
    }

    public function show(Request $request, User $user)
    {
        if (!$request->ajax()) return view();
        return response()->json(['user' => $user], 200);
    }

    public function store(UserRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = new User($request->all());
            $user->save();
            $this->uploadFile($user, $request);
            $user->assignRole($request->role);
            DB::commit();
            if (!$request->ajax()) return back()->with("success", 'User created');
            return response()->json(['status' => 'User created'], 201);
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            if (!$request->filled('password')) {
                unset($data['password'], $data['password_confirmation']);
            }
            if (!$request->filled('file')) {
                unset($data['file']);
            }
            $user->update($data);
            $this->uploadFile($user, $request);
            $user->syncRoles([$request->role]);
            DB::commit();
            if (!$request->ajax()) return back()->with("success", 'User updated');
            return response()->json([], 204);
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }


    public function destroy(Request $request, User $user)
    {
        $user->delete();
        $this->deleteFile($user);
        if (!$request->ajax()) return back()->with("success", 'User deleted');
        return response()->json([], 204);
    }
}
