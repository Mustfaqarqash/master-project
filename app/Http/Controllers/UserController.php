<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $userCount = User::all()->where('role' , 'user')->count();
        $storeCount = User::all()->where('role' , 'store')->count();
        $adminCount = User::all()->where('role' , 'admin')->count();
        $allUser = User::all()->count();
        $lastUser = User::all()->last();
        $growth = User::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();


        // Fetch users with pagination, applying search filter if provided
        $search = $request->input('search');
        $role = $request->input('role'); // Get the selected role from the request

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })
            ->when($role, function ($query, $role) {
                return $query->where('role', $role);
            })
            ->paginate(5);
//        dd(User::find(1)->categories());
        return view('dashboard.users.index', compact('users',
            'search' ,
            'userCount' ,
            'storeCount',
            'adminCount',
            'allUser',
            'lastUser',
            'growth',
        ));
    }


    public function create()
    {
        return view('dashboard.users.create'); // A separate form view for creating a new user
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Hash password
        $user->role = $request->role;

        if ($request->hasFile('image')) {
            $user->image = $request->file('image')->store('uploads', 'public');
        }

        $user->save();
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password); // Update password if provided
        }
        $user->role = $request->role;

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete(str_replace('storage/', 'public/', $user->image));
            }
            $user->image = $request->file('image')->store('uploads', 'public');
        }

        $user->save();
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->image) {
            Storage::delete(str_replace('storage/', 'public/', $user->image));
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
    public function showAccount()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('auth.account.index', compact('user')); // Show account view
    }

    // Update the authenticated user's account information
    public function updateAccount(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'organization' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'time_zone' => 'required|string|max:100',
            'currency' => 'required|string|max:10',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:800',
        ]);

        // Update user details
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password); // Update password if provided
        }

        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->image) {
                Storage::delete(str_replace('storage/', 'public/', $user->image));
            }
            $user->image = $request->file('profile_image')->store('uploads', 'public');
        }

        // Other fields
        $user->organization = $request->organization;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->time_zone = $request->time_zone;
        $user->currency = $request->currency;

        $user->save(); // Save changes

        return redirect()->route('account.show')->with('success', 'Account updated successfully.');
    }

    // Deactivate the authenticated user's account
    public function deactivateAccount(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user

        $request->validate([
            'account_deactivation' => 'required|accepted',
        ]);

        // Delete the user's image if it exists
        if ($user->image) {
            Storage::delete(str_replace('storage/', 'public/', $user->image));
        }

        $user->delete(); // Delete the user account

        return redirect()->route('login')->with('success', 'Account deactivated successfully.');
    }

}
