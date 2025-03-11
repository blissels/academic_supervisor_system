<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('lecturer.index')
      ->with('lecturers', Lecturer::with('students')->get());
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('lecturer.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'nik' => ['required', 'string', 'max:7', 'unique:lecturer,nik'],
      'name' => ['required', 'string', 'max:100'],
      'birth_date' => ['required'],
      'email' => ['required', 'email', 'max:50', 'unique:lecturer,email'],
    ]);
    $lecturer = new Lecturer($validatedData);
    $lecturer->save();
    return redirect()->route('lecturer-list');
  }

  /**
   * Display the specified resource.
   */
  public function show(Lecturer $lecturer)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Lecturer $lecturer)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Lecturer $lecturer)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Lecturer $lecturer)
  {
    //
  }
}
