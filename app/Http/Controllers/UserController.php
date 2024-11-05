<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Traits\DeleteFile;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use uploadFile, DeleteFile;

    public function index(Request $request)
    {
        $query = User::with('company');

        if ($request->name) {
            $query->where("name", "like", "%{$request->name}%");
        }

        if ($request->email) {
            $query->orWhere("email", "like", "%{$request->email}%");
        }

        $users = $query->paginate(1);
        $users->appends($request->all());

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 1);
    }



    public function create()
    {
        $companies = Company::all();

        return view('user.form', compact('companies'));
    }


    public function store(Request $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        $user = User::create($request->except(['avatar']));

        if ($request->hasFile('avatar')) {
            $file_name = $this->uploadFile($request->file('avatar'), 'avatar');
            $user->update(['avatar' => $file_name]);
        }

        return to_route('user.index')->with('success', 'New User Created Successfully!');
    }


    public function edit(User $user)
    {
        $companies = Company::all();

        return view('user.form', compact('user', 'companies'));
    }


    public function update(Request $request, User $user)
    {
        if (!empty($request->password)) {
            $request->merge(['password' => Hash::make($request->password)]);
        }

        $user->update($request->except(['avatar']));

        if ($request->hasFile('avatar')) {
            $this->deleteFile($user->avatar, 'avatar');
            $file_name = $this->uploadFile($request->file('avatar'), 'avatar');
            $user->update(['avatar' => $file_name]);
        }

        return to_route('user.index')->with('success', 'User Updated Successfully!');
    }


    public function destroy(User $user)
    {
        $this->deleteFile($user->logo, 'avatar');
        $user->delete();

        return back()->with('success', 'User Deleted Successfully!');
    }
}
