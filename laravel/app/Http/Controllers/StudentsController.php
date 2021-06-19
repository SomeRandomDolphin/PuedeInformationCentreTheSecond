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
