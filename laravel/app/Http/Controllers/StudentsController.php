<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Student::paginate(20);
        //dd($siswa);
        return view('students/index', ['siswa'=> $siswa]);
    }

    public function trashindex()
    {
        $siswa = Student::onlyTrashed()->paginate(20);
        //dd($siswa);
        return view('students/indextrash', ['siswa'=> $siswa]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => ['required', 'min:3'],
            'dateofbirth' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'description' => ['required', 'max:500'],
        ]);

        $student = new Student;
        $student->name = $request->fullname;
        $student->birthdate = $request->dateofbirth;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->short_description = $request->description;
     
        $student->save();

        return redirect('students');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students/edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        Student::where('id', $id)
        -> update([
            'name' => $request->fullname,
            'birthdate' => $request->dateofbirth,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'short_description' => $request->description,
        ]);
        return redirect('students');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('students');
    }

    public function trashrestore($id)
    {
        Student::withTrashed()->find($id)->restore();
        return redirect('students');
    }

    public function trashdestroy($id)
    {
        Student::withTrashed()->find($id)->forceDelete();
        return redirect('students/trash');
    }
}
