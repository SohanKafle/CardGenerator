<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $totalvisits = Visit::sum('number_of_visits');
        $date = \Carbon\Carbon::today()->subDays(30);
        $visitdate = Visit::where('visit_date', '>=', $date)->pluck('visit_date');
        $visits = Visit::where('visit_date', '>=', $date)->pluck('number_of_visits');

        $totalMembers = Member::count();
        return view('dashboard', [
            'title' => 'Dashboard' 
        ], compact('totalMembers', 'totalvisits', 'visitdate', 'visits'));
    }

   
}


