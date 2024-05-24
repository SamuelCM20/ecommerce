<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UserRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use  App\Http\Requests\user\RegisterRequest;
use App\Http\Traits\UploadFile;
use App\Models\File;

class RegisterController extends Controller
{

    use RegistersUsers;



    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function register(RegisterRequest $request)
    {
        $user = new User($request->all());
        $user->save();
        $user->assignRole('user');

        $file = new File(['route' => '/storage/images/users/default.png']);
        $user->file()->save($file);
        Auth::login($user);
        return redirect($this->redirectPath());
    }
}
