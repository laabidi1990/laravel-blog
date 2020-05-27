<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\Users\UpdateProfileRequest;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    public function edit() 
    {
        return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdateProfileRequest $request, User $user)
    {
        $data = $request->only(['name', 'about']);

        if (auth()->user()) {

            $user->update($data);

            session()->flash('success', 'User profile updated successfully');
    
            return redirect()->back();
        }
    }

    public function makeUserAdmin(User $user) 
    {
        $user->role = 'admin';

        $user->save();

        session()->flash('success', 'User is now admin');

        return redirect(route('users.index'));
    }
    
    public function removeUserAdmin(User $user) 
    {
        $user->role = 'writer';

        $user->save();

        session()->flash('success', 'User is now writer');

        return redirect(route('users.index'));
    }   
  
    public function destroy(User $user)
    {
        $user->delete();
    }
}
