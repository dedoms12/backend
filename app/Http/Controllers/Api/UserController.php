<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        return $user;
    }
    public function show(string $id)
    {
        return User::findOrfail($id);
    }
    public function destroy(string $id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return $user;
    }
}
