@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Studens</p>
                    <h5 class="font-weight-bolder">
                      {{ $Students->count() }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">On Current Semester</p>
                    <h5 class="font-weight-bolder">
                      {{ $Students->count() }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Active</p>
                    <h5 class="font-weight-bolder">
                      +3,462
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Dropped</p>
                    <h5 class="font-weight-bolder">
                      $103,430
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row pt-4">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>STUDENT'S TABLE</h6>
            <span class="text-end">
                <!--<a class="btn btn-primary text-white px-3 py-2" href="{{ route('student.addpage') }}">-->
                    <button type="button" class="btn btn-primary text-white " data-bs-toggle="modal" data-bs-target="#addStudentModal">
                        <i class="fa-solid fa-plus"></i><i class="fa-regular fa-user"></i> New Student
                    </button>

                </a>

            </span>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0 mx-2" >
              <table class="table align-items-center mb-0 table-bordered table-striped nowrap " id="studentTable"  >
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Student</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Section</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sex</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Year Level</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Students as $student )
                        <tr>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-gradient-success">{{ $loop->index +1 }}</span>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $student->firstname . " " . Str::substr( $student->lastname, 0,1)  }}</h6>
                                    <p class="text-xs text-secondary mb-0">{{ $student->idnumber}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $student->sections->last()->sectionname }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $student->address }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $student->contact }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $student->sex }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $student->yearlevel }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-gradient-success">{{ $student->status }}</span>
                            </td>
                            <td>
                                <button class="btn btn-primary px-2 py-2">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn btn-warning px-2 py-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
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
<!--Add student Modal-->
        <div class="modal fade" id="addStudentModal" role="dialog" >
            <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content" >
                <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white">
                Add Student
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form role="form" method="post" action="{{ route('student.store') }}">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <h6 class="mb-0 text-sm">ID Number</h6>
                                <input type="text" class="form-control" placeholder="ID number" name="idnumber" required >
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <h6 class="mb-0 text-sm">First Name</h6>
                                <input type="text" class="form-control" placeholder="First Name" name="firstname"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <h6 class="mb-0 text-sm">Middle Name</h6>
                                <input type="text" class="form-control" placeholder="Middle Name" name="middlename"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <h6 class="mb-0 text-sm">Last Name</h6>
                                <input type="text" class="form-control" placeholder="Last Name" name="lastname" required >
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <h6 class="mb-0 text-sm">Sex</h6>
                                <select class="form-control" aria-label="yearlevelSelect" name="sex" required>
                                    <option value="M"> Male</option>
                                    <option value="F"> Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <h6 class="mb-0 text-sm">Class Section</h6>
                                <select class="form-control" aria-label="yearlevelSelect" name="section" required>
                                    @foreach ($Sections as $section )
                                        <option value="{{ $section->id }}"> {{ $section->sectionname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <h6 class="mb-0 text-sm">Birthdate</h6>
                                <input type="date" class="form-control" placeholder="Birthday" name="birthdate"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <h6 class="mb-0 text-sm">Address</h6>
                                <input type="text" class="form-control" placeholder="Address" name="address"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <h6 class="mb-0 text-sm">Contact Number</h6>

                                <input type="text" class="form-control" placeholder="Contact" name="contact"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <h6 class="mb-0 text-sm">Year Level</h6>
                                <select class="form-control" aria-label="yearlevelSelect" name="yearlevel" required>
                                    <option value="1"> First Year</option>
                                    <option value="2"> Second Year</option>
                                    <option value="3"> Third Year</option>
                                    <option value="4"> Fourth Year</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <h6 class="mb-0 text-sm">Password</h6>
                                <input type="password" class="form-control" placeholder="Password" name="password"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <h6 class="mb-0 text-sm">Confirm Password</h6>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <button class="btn btn-primary text-white text-center w-100">SUBMIT</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            </div>
        </div>

</div>


<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#studentTable').DataTable( {
            responsive: true,
        } );

        new $.fn.dataTable.FixedHeader( table );
    });
</script>


@endsection
