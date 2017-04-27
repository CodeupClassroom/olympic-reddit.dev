<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    public function index()
    {
        // 1. Model queries the database
        // 2. Pass the result/rows from the model to the view
        //

        $students = \App\Models\Student::all();

        return view('students.index')->with('students', $students);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $student = new \App\Models\Student();
        $student->first_name = $request->first_name;
        $student->school_name = $request->school_name;
        $student->subscribed = $request->subscribed;
        $student->description = $request->description;
        $student->save();

        return redirect()->action('StudentsController@index');
    }

    public function edit($id)
    {
        return view('students.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = \App\Models\Student::find($id);

        return view('students.show')->with('student', $student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'Deleting post with ID ' . $id;
    }
}
