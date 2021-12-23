<?php

namespace App\Http\Controllers;

use App\Models\PartTimeEmployee;
use Illuminate\Http\Request;

class PartTimeEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = PartTimeEmployee::paginate();
        return view('part.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('part.create');
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
        PartTimeEmployee::create($request->all());
        return redirect()->route('part.index')->with('success', 'Part Time Employee Added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = PartTimeEmployee::findOrFail($id);
        return view('part.show', ['employee' => $employee]);
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
        PartTimeEmployee::destroy($id);
        return redirect()->route('part.index')->with('success', 'employee deleted!');
    }

    public function attend($id)
    {
        $employee = PartTimeEmployee::findOrFail($id);
        $hoursAttend = $employee->attend;
        $hours = $hoursAttend + 1;
        $employee->forceFill(['attend' => $hours])->save();
        return redirect()->route('part.index', $employee->id)->with('success', 'Attendance was recorded for employee ' . $employee->name);
    }

    public function transfer($id)
    {
        $employee = PartTimeEmployee::findOrFail($id);
        $hoursAttend = $employee->attend;
        $mSalary = $employee->salary * $hoursAttend;
        $employee->forceFill(['attend' => 0])->save();
        return redirect()->route('part.show', $employee->id)->with('success', $mSalary . '$  has been transferred');
    }
}
