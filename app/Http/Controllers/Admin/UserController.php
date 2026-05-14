<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\ActivityLogger;

class UserController extends Controller
{
    // Users list
    public function index()
    {
        // $totalUsers = User::where('role','user')->count();
        // $activeUsers = User::where(['status'=> 1, 'role'=>'user'])->count();
        // $inactiveUsers = User::where(['status'=> 0, 'role'=>'user'])->count();
        // $users = User::select('id', 'name', 'email', 'role', 'phone', 'status')->where('role','user')->get();
        // return view('admin.users.index', [
        //     'totalUsers' => $totalUsers,
        //     'activeUsers' => $activeUsers,
        //     'inactiveUsers' => $inactiveUsers,
        //     'users' => $users,
        // ]);

        // Fetch all users except admin (optional)
        // $users = User::select('id', 'name', 'email', 'phone', 'role', 'status')->orderBy('id', 'desc')->get();

        $users = User::select('id', 'name', 'email', 'role', 'status', 'phone')->orderBy('id', 'desc')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        // $user = User::select('id', 'name', 'email', 'phone')->find($id);
        // return view('admin.users.edit-user', [
        //     'user' => $user,
        // ]);

        $user = User::select('id', 'name', 'email', 'role', 'status', 'phone')->findOrFail($id);

        return view('admin.users.edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // $user = User::select('id', 'name', 'email', 'phone')->find($id);
        // $user->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        // ]);
        // return redirect()->route('admin.users.index')->with('success', 'User updated successfully.'); // ->with('user', $user);

        $user = User::select('id', 'name', 'email', 'phone', 'role', 'status')->findOrFail($id);

        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|unique:users,email,' . $user->id,
            'phone'   => 'nullable|string|max:20',
            'status'  => 'required|in:0,1',
        ]);

        $user->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'status'  => $request->status,
        ]);

        ActivityLogger::log(
            'update_user',
            "Admin updated user: {$user->name} (ID: {$user->id})"
        );

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    public function changeStatus($id)
    {
        // $user = User::select('id', 'status')->find($id);
        // $user->status = !$user->status;
        // $user->save();
        // return redirect()->route('admin.users.index')->with('success', 'User status changed successfully.')->with('user', $user);

        $user = User::select('id', 'role', 'status')->findOrFail($id);

        // Prevent admin from deactivating himself (optional but good logic)
        if ($user->role == 'admin') {
            return redirect()->back()->with('error', 'Admin status cannot be changed!');
        }

        $user->status = !$user->status;
        $user->save();

        ActivityLogger::log(
            'change_status',
            "Admin changed status of user: {$user->name} (ID: {$user->id})"
        );

        return redirect()->back()->with('success', 'User status updated successfully!');
    }

    public function destroy($id)
    {
        // $user = User::select('id')->where('id', $id)->first();
        // if(!$user){
        //     return redirect()->route('admin.users.index')->with('error', 'User not found.');
        // }
        // $user->delete();
        // return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');

        $user = User::select('id', 'role')->findOrFail($id);

        if(!$user){
            return redirect()->route('admin.users.index')->with('error', 'User not found.');
        }

        // Prevent deleting admin
        if ($user->role == 'admin') {
            return redirect()->back()->with('error', 'Admin cannot be deleted!');
        }

        $user->delete();

        ActivityLogger::log(
            'delete_user',
            "Admin deleted user: {$user->name} (ID: {$user->id})"
        );

        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}
