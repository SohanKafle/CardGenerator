<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // Show all members
    public function index()
    {
        $members = Member::paginate(5);
        return view('admin.member.index', compact('members'));
    }

    // Show form to create a new member
    public function create()
    {
        return view('members.create');
    }

    // Store a new member
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:members,phone|numeric|digits:10',
        ]);

        $member = new Member();
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->member_id = $this->generateMemberId();  // Auto-generate Member ID
        $member->save();

        return redirect()->route('search')->with('success', 'Member created successfully!');
    }

    // Show form to edit a member
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    // Update a member
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10|unique:members,phone,' . $id,
        ]);

        $member = Member::findOrFail($id);
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->save();

        return redirect()->route('members.index')->with('success', 'Member updated successfully!');
    }

    // Delete a member
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully!');
    }

    // Generate a unique Member ID
    private function generateMemberId()
    {
        $lastMember = Member::latest()->first();
        if ($lastMember) {
            return 'M' . str_pad(substr($lastMember->member_id, 1) + 1, 6, '0', STR_PAD_LEFT);
        } else {
            return 'M000001'; // Start from M000001
        }
    }
}
