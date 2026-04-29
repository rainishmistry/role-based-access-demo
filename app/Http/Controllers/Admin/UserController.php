<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Users list
    public function index()
    {
        $totalUsers = User::where('role','user')->count();
        $activeUsers = User::where(['status'=> 1, 'role'=>'user'])->count();
        $inactiveUsers = User::where(['status'=> 0, 'role'=>'user'])->count();
        $users = User::select('id', 'name', 'email', 'role', 'phone', 'status')->where('role','user')->get();
        return view('admin.users.index', [
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'inactiveUsers' => $inactiveUsers,
            'users' => $users,
        ]);
    }

    public function edit($id)
    {
        $user = User::select('id', 'name', 'email', 'phone')->find($id);
        return view('admin.users.edit-user', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::select('id', 'name', 'email', 'phone')->find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.'); // ->with('user', $user);
    }

    public function changeStatus($id)
    {
        $user = User::select('id', 'status')->find($id);
        $user->status = !$user->status;
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'User status changed successfully.')->with('user', $user);
    }

    public function destroy($id)
    {
        $user = User::select('id')->where('id', $id)->first();
        if(!$user){
            return redirect()->route('admin.users.index')->with('error', 'User not found.');
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
