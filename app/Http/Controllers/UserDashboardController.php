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
        'department'=>'required',
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
    $userDashboard->department = $request->department;
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
    // Retrieve all records from UserDashboard table
    $showUserDashboard = UserDashboard::orderBy('created_at', 'desc')->get();
    //dd($showUserDashboard);
    // Pass the data to the view
    return view('dashboard', compact('showUserDashboard'));
}

public function delete($id){
    $deleteUser = UserDashboard::find($id);
   if($deleteUser){
    $deleteUser->delete();
    return response()->json(['success' => true, 'message' => 'User deleted successfully']);
   }else{
    return response()->json(['message' => 'User not found'], 404);
   }
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $editUserDashboard = UserDashboard::find($id);

        if ($editUserDashboard) {
            return response()->json([
                'success' => true,
                'user' => $editUserDashboard
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ]);
        }

    }

    public function update(Request $request, $id)
{
    // Find user or return an error if not found
    $updateData = UserDashboard::find($id);
   
    $updateData->name = $request->editName;
    $updateData->email = $request->editEmail;
    $updateData->phone = $request->editPhone;
    $updateData->address = $request->editAddress;
    $updateData->country = $request->editCountry;
    $updateData->city = $request->editCity;
   // $updateData->skills = implode(',', $request->skills); 

    $updateData->gender = $request->editGender;
    $updateData->note = $request->editNote;
    $updateData->save();

    return response()->json(['success' => true, 'message' => 'User updated successfully']);

}

    public function filter(Request $request)
    {
        $search = $request->get('search');

        // Filter users based on the search query
        $filteredUsers = UserDashboard::where('name', 'like', '%' . $search . '%')
                             ->orWhere('email', 'like', '%' . $search . '%')
                             ->orWhere('phone', 'like', '%' . $search . '%')
                             ->get();
    
        return response()->json(['users' => $filteredUsers]);

    }
}
