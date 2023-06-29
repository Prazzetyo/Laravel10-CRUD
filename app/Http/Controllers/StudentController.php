<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    function index(): View
    {
        $data['students'] = Student::all();
        return view('dashboard', $data);
    }

    function store(Request $req): RedirectResponse
    {
        $validator = Validator::make($req->all(), [
            'name'      => 'required',
            'course'    => 'required',
            'email'     => 'required',
            'phone'     => 'required',
        ], [
            'required' => 'Parameter :attribute tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            return redirect('dashboard')->with('err_msg', $validator);
        }

        $student            = new Student();
        $student->name      = $req->input('name');
        $student->course    = $req->input('course');
        $student->email     = $req->input('email');
        $student->phone     = $req->input('phone');
        $student->save();

        return redirect('dashboard')->with('succ_msg', 'Success added student!');
    }

    function update(Request $req): RedirectResponse
    {
        $validator = Validator::make($req->all(), [
            'name'      => 'required',
            'course'    => 'required',
            'email'     => 'required',
            'phone'     => 'required',
        ], [
            'required' => 'Parameter :attribute tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            return redirect('dashboard')->with('err_msg', $validator);
        }

        $student = Student::findOrFail($req->id);
        $student->name      = $req->input('name');
        $student->course    = $req->input('course');
        $student->email     = $req->input('email');
        $student->phone     = $req->input('phone');
        $student->save();

        return redirect('dashboard')->with('succ_msg', 'Success updated student!');
    }

    function destroy(Request $req): RedirectResponse
    {
        $validator = Validator::make($req->all(), [
            'id'        => 'required',
        ], [
            'required' => 'Parameter :attribute boleh kosong!',
        ]);

        if ($validator->fails()) {
            return redirect('dashboard')->with('err_msg', $validator);
        }

        $student = Student::findOrFail($req->id);
        $student->delete();

        return redirect('dashboard')->with('succ_msg', 'Success deleted student!');
    }
}
