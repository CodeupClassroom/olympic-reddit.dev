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
        $students = \App\Models\Student::paginate(4);

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

        $request->session()->flash('successMessage', 'Post saved successfully');
        
        return redirect()->action('StudentsController@show', $student->id);

        /*var_dump($request->all());
        var_dump($request->first_name);*/

        // return back()->withInput();  // redirect back to the previous page (/students/create) with all the user input
    }

    public function edit($id)
    {
        $student = \App\Models\Student::find($id);

        if(!$student) {
            \Session::flash("errorMessage", "Student not found");
        }

        return view('students.edit')->with('student', $student);
    }

    public function update(Request $request, $id)
    {
        $student = \App\Models\Student::find($id);

        if(!$student) {
            \Session::flash("errorMessage", "Student not found");
            return redirect()->action("StudentsController@index");
        }

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

        if(!$student) {
            
            \Session::flash('errorMessage', "Student not found");
            return redirect()->action('StudentsController@index');
        }

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

        if(!$student) {
            \Session::flash('errorMessage', "Post not found");
            return redirect()->action('StudentsController@index');
        }

        $student->delete();

        return redirect()->action('StudentsController@index');
    }
}
