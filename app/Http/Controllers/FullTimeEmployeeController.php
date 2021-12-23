<?php

namespace App\Http\Controllers;

use App\Models\FullTimeEmployee;
use Illuminate\Http\Request;

class FullTimeEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = FullTimeEmployee::paginate();
        return view('full.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('full.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'identity' => ['required'],
            'mobile' => ['required'],
            'bank_account_number' => ['required'],
            'salary' => ['required'],
        ]);
        FullTimeEmployee::create($request->all());
        return redirect()->route('full.index')->with('success', 'Full Time Employee Added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = FullTimeEmployee::findOrFail($id);
        return view('full.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FullTimeEmployee::destroy($id);
        return redirect()->route('full.index')->with('success', 'employee deleted!');
    }

    public function attend($id)
    {
        $employee = FullTimeEmployee::findOrFail($id);
        $dayAttend = $employee->attend;
        $days = $dayAttend + 1;
        $employee->forceFill(['attend' => $days])->save();
        return redirect()->route('full.index', $employee->id)->with('success', 'Attendance was recorded for employee ' . $employee->name);
    }

    public function transfer($id)
    {
        $employee = FullTimeEmployee::findOrFail($id);
        $dayAttend = $employee->attend;
        $mSalary = $employee->salary / 30 * $dayAttend;
        $employee->forceFill(['attend' => 0])->save();
        return redirect()->route('full.show', $employee->id)->with('success', $mSalary . '$  has been transferred');
    }

}
