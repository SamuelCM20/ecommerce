<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPassword;
use App\Models\User;
use Illuminate\Support\Str;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    

    use ResetsPasswords;

    public function reset(ResetPassword $request)
	{
		$response = $this->broker()->reset(
			$this->credentials($request),
			function ($user, $password) {
				$this->resetPassword($user, $password);
			}
		);

		return $response == Password::PASSWORD_RESET
			? $this->sendResetResponse($request, $response)
			: $this->sendResetFailedResponse($request, $response);
	}

	protected function resetPassword(User $user, $password)
	{
		$user->update(['password' => $password, 'remember_token' => Str::random(20)]);
		Auth::login($user);
	}

	protected $redirectTo = RouteServiceProvider::HOME;
}
