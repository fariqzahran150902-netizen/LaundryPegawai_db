<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = staff::all();
        return view('staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        staff::create($request->all());
        return redirect()->route('staff.index');
    }

    public function edit(staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, staff $staff)
    {
        $staff->update($request->all());
        return redirect()->route('staff.index');
    }

    public function destroy(staff $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index');
    }
}