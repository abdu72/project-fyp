<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\post;
use App\Models\Heir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; // Tambahkan ini

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin', auth()->user())) {
            $users = User::all(); // Fetch all users from the database
    
            return view('dashboard.admin.index', ['users' => $users]); // Pass the $users variable to the view

        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    // ... (method-method lainnya)

    public function destroy(User $user)
{
    if (Gate::allows('admin', auth()->user())) {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    } else {
        abort(403, 'Unauthorized action.');
    }
}


public function userDetails()
    {
        // Ambil data user dengan ID tertentu, serta informasi warisan dan wasiat mereka
        $users = User::with(['heirs', 'posts'])->get();

        return view('dashboard.admin.user_details', compact('users'));
    }


}