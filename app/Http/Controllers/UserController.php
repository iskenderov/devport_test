<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index')->with(['users' => User::paginate(10)]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(CreateUser $request)
    {
        $data = array_merge(
            $request->validated(), [
                'secure_key' => md5(Hash::make($request->_token)),
                'expired_at' => now()->addDays(7),
            ]
        );

        User::create($data);

        return redirect(route('user.index'));
    }

    public function edit(User $user)
    {
        return view('user.edit')->with(['user' => $user]);
    }

    public function update(CreateUser $request, User $user)
    {
        $user->update($request->validated());

        return redirect(route('user.index'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('user.index'));
    }
}
