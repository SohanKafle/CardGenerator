<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index($id = null)
{
     dd($id);
    if ($id) {
       
        $member = Member::findOrFail($id);
        return view('search', compact('member'));
    } else {
        
        return view('search'); 
    }
}

   

public function search(Request $request)
{
    $request->validate([
        'phone' => 'required|numeric|digits:10',
    ]);

    // Search for member by phone number
    $member = Member::where('phone', $request->phone)->first();

    // If a member is found, return the data, else return an error message
    if ($member) {
        return response()->json([
            'status' => 'success',
            'member' => $member
        ]);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'No membership found with that phone number.'
        ]);
    }
}
}
