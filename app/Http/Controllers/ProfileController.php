<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('users.profile');
    }

    public function edit($id) 
    {
        $user = User::findOrFail($id);
        return view('users.editProfile')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);
    
        $user->fill($data);
        $user->save();
        Session::flash('success', 'Your profile has been updated!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        Session::flash('success', 'Your profile has been deleted.');
        return redirect('register');
    }
}
