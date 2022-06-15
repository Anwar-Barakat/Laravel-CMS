<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.profile.index', ['user' => Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->isMethod('put')) {
            $data = $request->only(['current_password', 'password', 'password_confirmation']);
            if (Hash::check($data['current_password'], Auth::user()->password)) {
                $validatedData = $request->validate([
                    'password'                  => 'required|min:6|confirmed',
                    'password_confirmation'     => 'required|min:6',
                ]);
                User::where('id', Auth::user()->id)->update([
                    'password'  => bcrypt($validatedData['password']),
                ]);
                Session::flash('message', 'Password has been updated successfully');
            } else {
                Session::flash('alert-type', 'error');
                Session::flash('message', 'Current password is wrong');
            }
            return redirect()->back();
        }
    }

    public function updateDetails(Request $request)
    {
        if ($request->isMethod('put')) {

            $data = $request->only(['name', 'image', 'description']);
            $validatedData = $request->validate([
                'name'          => 'required|regex:/^[\pL\s\-]+$/u',
                'description'   => 'nullable|min:10',
                'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:1048',
            ]);

            $admin = User::where('id', Auth::user()->id)->first();
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $admin->clearMediaCollection('users');
                $admin->addMediaFromRequest('image')->toMediaCollection('users');
            }


            $admin->update([
                'name'          => $validatedData['name'],
                'description'   => $validatedData['description']
            ]);
            Session::flash('message', 'Admin details has been updated successfully');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //

    }
}