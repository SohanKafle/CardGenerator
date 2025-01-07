<?php

namespace App\Http\Controllers;


use App\Models\Member;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    public function index($id = null)
{
    if ($id) {
       
        $member = Member::findOrFail($id);
        return view('search', compact('member'));
    } else {
        
        return view('search'); 
    }
}

public function welcome()
{
    $this->visits();

    return view('welcome');
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
public function visits()
{
    if (!Session::has('visit')) {

        $last_date = Visit::latest('visit_date')->first();
        $visit_date = date('Y-m-d');
        if ($last_date) {
            if ($last_date->visit_date != $visit_date) {
                $number_of_visits = 1;
                $d = new Visit();
                $d->visit_date = $visit_date;
                $d->number_of_visits = $number_of_visits;
                $d->save();
            } else {
                $newvisit = $last_date->number_of_visits + 1;
                Visit::where('visit_date', $visit_date)->update(['number_of_visits' => $newvisit]);
            }
        } else {
            $number_of_visits = 1;
            $d = new Visit();
            $d->visit_date = $visit_date;
            $d->number_of_visits = $number_of_visits;
            $d->save();
        }
        Session::save();
    }
}
}
