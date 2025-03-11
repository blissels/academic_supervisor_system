<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('student.index')
      ->with('students', Student::with('academicSupervisor')->get());
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('student.create')
      ->with('lecturers', Lecturer::all());
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'nrp' => ['required', 'string', 'max:9', 'unique:student,nrp'],
      'name' => ['required', 'string', 'max:100'],
      'birth_date' => ['required'],
      'phone' => ['required', 'numeric'],
      'email' => ['nullable', 'email', 'max:50', 'unique:student,email'],
      'address' => ['required', 'string', 'max:300'],
      'lecturer_nik' => ['required', 'string'],
    ]);
    $student = new Student($validatedData);
    $student->save();
    return redirect()->route('student-list');
  }

  /**
   * Display the specified resource.
   */
  public function show(Student $student)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Student $student)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Student $student)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Student $student)
  {
    //
  }
}
