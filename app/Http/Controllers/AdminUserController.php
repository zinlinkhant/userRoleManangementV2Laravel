<?php

namespace App\Http\Controllers;

use App\Models\Admin_user;
use App\Http\Requests\StoreAdmin_userRequest;
use App\Http\Requests\UpdateAdmin_userRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:admin_users',
            'email' => 'required|email|unique:admin_users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Admin_user::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return view('welcome')->with('success', 'Registration successful. Please login.');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('welcome');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // Handle logout
    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    /**
     * Display a listing of the resource.
     */
    public function showAssignRolePage()
    {
        $adminUsers = Admin_user::all();
        $roles = Role::all();

        $users = Admin_user::with('role')->get();
        return view('auth.assign_role', compact('adminUsers', 'roles', 'users'));
    }

    public function assignRole(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'admin_user_id' => 'required|exists:admin_users,id',
        ]);
        $adminUser = Admin_user::findOrFail($request->admin_user_id);

        $adminUser->update(['role_id' => $request->role_id]);

        return redirect()->route('assignRolePage')->with('success', 'Role assigned successfully.');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdmin_userRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin_user $admin_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin_user $admin_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdmin_userRequest $request, Admin_user $admin_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin_user $admin_user)
    {
        //
    }
}
