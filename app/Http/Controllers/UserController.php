<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\UserRequest;
use App\Http\Requests\user\UserUpdateRequest;
use App\Http\Traits\UploadFile;
use App\Models\File;
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
        $Isfile = true;
        if (!$request->hasFile('file')) {
            unset($request['file']);
            $Isfile = false;
        };

        try {
            DB::beginTransaction();
            $user = new User($request->all());
            $user->save();
            $user->syncRoles([$request->role]);

            if (!$Isfile) {
                $file = new File(['route' => '/storage/images/users/default.png']);
                $user->file()->save($file);
            } else {
                $this->uploadFile($user, $request);
                $user->save();
            }
            DB::commit();
            return response()->json([], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $user->update($data);
            if ($request->hasFile('file')) {
                $this->uploadFile($user, $request);
            }
            if (!$request->filled('password')) unset($data['password'], $data['password_confirmation']);
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
