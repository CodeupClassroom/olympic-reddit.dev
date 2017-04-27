<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $student->description = $request->description;
        $student->subscribed = $request->subscribed;
        $student->school_name = $request->school_name;
        $student->save();

        return redirect()->action('StudentsController@index');

        /*var_dump($request->all());
        var_dump($request->first_name);*/

        // return back()->withInput();  // redirect back to the previous page (/students/create) with all the user input
    }

    public function edit($id)
    {
        $student = \App\Models\Student::find($id);

        return view('students.edit')->with('student', $student);
    }

    public function update(Request $request, $id)
    {
        $student = \App\Models\Student::find($id);

        $student->first_name = $request->first_name;
        $student->description = $request->description;
        $student->subscribed = $request->subscribed;
        $student->school_name = $request->school_name;
        $student->save();

        return view('students.show')->with('student', $student);
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
        $student = \App\Models\Student::find($id);
        $student->delete();

        return redirect()->action('StudentsController@index');
    }
}
