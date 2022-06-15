<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users      = User::latest()->paginate(10);
        return view('backend.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if ($request->isMethod('post')) {
            $data               = $request->only(['name', 'email', 'password', 'description']);
            $data['slug']       = SlugService::createSlug(User::class, 'slug', $data['name']);
            $data['password']   = bcrypt($request->password);
            $user               = User::create($data);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $user->addMediaFromRequest('image')->toMediaCollection('users');
            }


            Session::flash('message', 'User has been added successfully');
            return redirect()->route('admin.users.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data               = $request->only(['name', 'email', 'description']);

        if ($request->has('password') && !empty($request->password) && !empty($request->password_confirmation)) {
            $this->validate($request, [
                'password'  => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $data['password']   = bcrypt($request->password);
        }

        $user->update($data);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $user->clearMediaCollection('users');
            $user->addMediaFromRequest('image')->toMediaCollection('users');
        }


        Session::flash('message', 'User has been Updated successfully');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Media::where(['model_id' => $user->id, 'collection_name' => 'users'])->delete();
        Session::flash('alert-type', 'info');
        Session::flash('message', 'User has been deleted successfully');
        return redirect()->route('admin.users.index');
    }
}