<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index ()
	{
		$users = User::all();
		return view('admin.user.index', compact('users'));
	}

	public function detail (int $userId)
	{
		$user = User::with('addresses')
			->find($userId);
		if (isset($user)) {
			$addresses = $user->addresses;
			return view('admin.user.detail', compact('user', 'addresses'));
		} else {
			$users = User::all();
			return view('admin.user.index', compact('users'));
		}
	}
}
