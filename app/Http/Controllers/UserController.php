<?php

namespace App\Http\Controllers;

use App\PostOffice;
use App\Profile;
use App\Role;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('frontend.users.dashboard',compact('user'));
    }

    public function dashboardProfile()
    {
        $user = Auth::user();
        $postOffices = PostOffice::all();
        return view('frontend.users.profile',compact('user','postOffices'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:100',

        ]);
        $user = Auth::user();

        $data = $request->all();

        $userData = [
            'name' => $data['name'],
            'dateofbirth' => $data['dateofbirth'],
            'email' => $data['email'],
            'number' => $data['number'],
            'post_office_id' => $data['post_office'],
        ];
        if ($request->password){
            $userData['password'] = Hash::make($data['password']);
        }

        $user->update($userData);
        $user->profile()->update([
            'bio' => $data['bio'],
            'facebook_uri' => $data['facebook_uri'],
        ]);

        return redirect()->route('user.dashboard')->withStatus('Update was successful!');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('backend.users.profile' , compact('user'));
    }


    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        $postOffice = PostOffice::pluck('post_office', 'id')->toArray();
        $roles = Role::pluck('name', 'id')->toArray();
        $selectedRoles = [];

        return view('backend.users.create',compact('postOffice','roles','selectedRoles'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:users|max:100',

        ]);

        $requestData = $request->all();

        $postOffice = PostOffice::findorFail($request->post_office_id);

        $user = $postOffice->users()->Create($requestData);

//        $user = User::create($requestData);
        $user->roles()->attach($request->role);

        return redirect()->route('users.index')->withStatus('Create was successful!');
    }


    public function show(User $user)//dependency injection
    {

        return view('backend.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $postOffice = PostOffice::pluck('post_office', 'id')->toArray();

        $roles = Role::pluck('name','id')->toArray();
        $selectedRoles = $user->roles->pluck('id')->toArray();

        return view('backend.users.edit', compact('user','postOffice','roles','selectedRoles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();

        $userData = [
            'name' => $data['name'],
            'dateofbirth' => $data['dateofbirth'],
            'email' => $data['email'],
            'active_role_id' => $data['active_role_id'],
            'post_office_id' => $data['post_office_id'],
        ];
        if ($request->password){
            $userData['password'] = Hash::make($data['password']);
        }

        $user->update($userData);
        $user->profile()->update([
            'bio' => $data['bio'],
            'facebook_uri' => $data['facebook_uri'],
        ]);

        $user->roles()->sync($request->roles);

       return redirect()->route('users.index')->withStatus('Update was successful!');
    }

    public function destroy(User $user)
    {
        try {

        $user->roles()->detach();
        $user->profile()->delete();
        $user->delete();

        return redirect()->route('users.index')->withStatus(' Delete was successful!');

        } catch (QueryException $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

}
