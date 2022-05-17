<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService extends Service
{
	public static function getPegawais()
	{
		return User::with('warung')
			->where(
				function ($query) {
					$query->where('role', '=', 2)
						->orWhere('role', '=', 3);
				}
			);
	}

	public static function resetPassword($id, $oldPassword, $newPassword)
	{
		$user = User::where('id', $id)->first();
		if (Hash::check($oldPassword, $user->password)) {
			User::where('id', $id)->update(['password' => Hash::make($newPassword)]);
			return true;
		} else {
			return false;
		}
	}
}
