<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('search');
    }

    public function searchResult($name)
    {
        // Check if the user is in the session
        $member = session('user');

        // If the user is not found in the session, try searching the user from the database
        if (!$member) {
            // Search the member by name
            $member = Member::where('name', $name)->first();
        }

        // If the member is not found, return an error message
        if (!$member) {
            return redirect()->route('searchForm')->withErrors('member not found!');
        }

        // If the member is found, return the membership information page
        return view('search', compact('member'));
    }
}
