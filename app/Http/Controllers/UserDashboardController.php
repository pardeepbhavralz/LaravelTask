<?php

namespace App\Http\Controllers;

use App\Models\UserDashboard;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("users.createUser");
    }

    
    public function create(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'gender' => 'required',
        'country' => 'required',
        'city' => 'required',
        'skills' => 'required|array',
        'note' => 'required',
    ]);

    $userDashboard = new UserDashboard;
    $userDashboard->name = $request->name;
    $userDashboard->email = $request->email;
    $userDashboard->phone = $request->phone;
    $userDashboard->address = $request->address;
    $userDashboard->country = $request->country;
    $userDashboard->city = $request->city;
    $userDashboard->skills = implode(',', $request->skills); 

    $userDashboard->gender = $request->gender;
    $userDashboard->note = $request->note;
    $userDashboard->save();

    return redirect('/dashboard')->with('success', 'Post Created');
}

    
   
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $showUserDashboard = UserDashboard::all();
        dd($showUserDashboard);
        die;    
        return view('/dashboard', compact('showUserDashboard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserDashboard $userDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserDashboard $userDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDashboard $userDashboard)
    {
        //
    }
}
