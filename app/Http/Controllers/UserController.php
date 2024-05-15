<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $users = User::with('roles')->get();
        if(!$request->ajax()) return view('users.index',compact('users'));
        return response()->json(['users' => $users],200); //view
    }

    
    public function create()
    {
        //view
    }

    
    public function store(UserRequest $request)
    {
        $user = new User($request->all());
        $user ->save();
        if(!$request->ajax()) return back()->with("success",'User created');
        return response()->json(['status' => 'User created'],201);
    }

    
    public function show(Request $request,User $user)
    {
        if(!$request->ajax()) return view();
        return response()->json(['user' => $user],200);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();
        if (!$request->filled('password')) {
            unset($data['password'], $data['password_confirmation']);
        }
        $user->update($data);
        // $user->syncRoles([$request->role]);
        if(!$request->ajax()) return back()->with("success",'User updated');
        return response()->json([],204);

    }

    
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        if(!$request->ajax()) return back()->with("success",'User deleted');
        return response()->json([],204);
    }
}
