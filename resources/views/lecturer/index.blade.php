@extends('layouts.index')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Lecturer Management</h3>
        <ul class="breadcrumbs mb-3">
          <li class="nav-home"><a href="#"><i class="icon-home"></i></a></li>
          <li class="separator"><i class="icon-arrow-right"></i></li>
          <li class="nav-item">Master</li>
          <li class="separator"><i class="icon-arrow-right"></i></li>
          <li class="nav-item"><a href="{{ route('lecturer-list') }}">Lecturer</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Add Lecturer</h4>
                <a href="{{ route('lecturer-create') }}" class="btn btn-primary btn-round ms-auto">
                  <i class="fa fa-plus"></i>
                  Add Data
                </a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table
                    id="table-lecturer"
                    class="display table table-striped table-hover"
                >
                  <thead class="thead-dark">
                  <tr>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Birth Date</th>
                    <th>Email</th>
                    <th>Students Count</th>
                    <th style="width: 10%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($lecturers as $lecturer)
                    <tr>
                      <td>{{ $lecturer->nik }}</td>
                      <td>{{ $lecturer->name }}</td>
                      <td>{{ \Carbon\Carbon::parse($lecturer->birth_date)->format('d M Y') }}</td>
                      <td>{{ $lecturer->email }}</td>
                      <td>{{ count($lecturer->students) }}</td>
                      <td>
                        <div class="form-button-action">
                          <button
                              type="button"
                              data-bs-toggle="tooltip"
                              title=""
                              class="btn btn-link btn-primary"
                              data-original-title="Edit Task"
                          >
                            <i class="fa fa-edit"></i>
                          </button>
                          <button
                              type="button"
                              data-bs-toggle="tooltip"
                              title=""
                              class="btn btn-link btn-danger"
                              data-original-title="Remove"
                          >
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('ExtraCSS')

@endsection

@section('ExtraJS')
  <script>
    $("#table-lecturer").DataTable({
      pageLength: 25,
    });
  </script>
@endsection