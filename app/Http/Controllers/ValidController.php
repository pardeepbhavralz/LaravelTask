<?php

namespace App\Http\Controllers;

use App\Models\UserDashboard;
use Illuminate\Http\Request;

class ValidController extends Controller
{
    public function emailValid(Request $request)
    {
        $emailCheck = $request->emailInput;
        $phoneCheck = $request->phoneInput;  
        //dd($emailCheck);  
    
        $fromThis = UserDashboard::where("email", $emailCheck)
    
        ->first();
        if ($fromThis) {
            return response()->json(['success' => true, 'message' => 'User Email matched successfully']);
        } else {
            return response()->json(['message' => 'error']);
        }
    }
    
}
