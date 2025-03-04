<?php

namespace App\Http\Controllers;

class DemoController extends Controller
{
  public function index()
  {
    $faculty = 'Smart Technology and Engineering';
    $departments = ['Electrical Engineering', 'Informatics', 'Information Systems'];
    return view('demo.file2', [
      'faculty' => $faculty
    ])->with('departments', $departments);
  }
}
