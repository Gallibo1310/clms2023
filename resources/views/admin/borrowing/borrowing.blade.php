@extends('layouts.app')



@section('content')

<div class="container-fluid py-4 bg-white">


    <div class="row pt-4 ">
        <div class="col-12 col-md-6  col-lg-6">
            <div class="card mb-4">
                <div class="card-body ">
                    <h5>Please select Requisitioner(s) below.</h5>
                    <hr>

                    <select class="form-select my-4 font-weight-bolder text-primary" id="borrowercategory">
                        <option value="1">Student</option>
                        <option value="2">Section</option>
                    </select>


                    <form action="{{ route('borrowing.addborrower') }}" method="POST" id="borrowerform">
                        @csrf
                        <input type="hidden" name="borrowercat" id="borrowercat">
                        <input type="hidden" name="borrowerid" id="borrowerid">
                    </form>
                    {{-- STUDENT TABLE --}}
                    {{-- STUDENT TABLE --}}
                    <div class="table-responsive p-0 mx-2"  id="studenttablediv">
                        <table class="table align-items-center mb-0 table-bordered table-striped nowrap W-100" id="studentTable"  >
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Student</th>
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
                                              <h6 class="mb-0 text-sm">{{ $student->firstname . " " . $student->lastname  }}</h6>
                                              <p class="text-xs text-secondary mb-0">{{ $student->sections->last()->sectionname }}</p>
                                              </div>
                                        </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary px-2 py-2" onclick="addborrower(1,{{ $student->id }})">
                                                    <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </td>
                                  </tr>
                              @endforeach

                          </tbody>
                        </table>
                    </div>

                    <script>
                        function addborrower(category, borrowerid)
                        {
                            document.getElementById('borrowercat').value = category;
                            document.getElementById('borrowerid').value  = borrowerid;
                            document.getElementById("borrowerform").submit();
                        }
                    </script>

                    {{-- SECTION TABLE --}}
                    {{-- SECTION TABLE --}}
                    <div class="table-responsive p-0 mx-2" id="sectiontablediv" hidden>
                        <table class="table align-items-center mb-0 table-bordered table-striped nowrap w-100" id="sectionTable"  >
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Section</th>
                              <th class="text-secondary opacity-7"></th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($Sections as $section )
                                  <tr>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">{{ $loop->index +1 }}</span>
                                        </td>
                                      <td>
                                        <div class="d-flex px-2 py-1">
                                              <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $section->sectionname  }}</h6>
                                                <p class="text-xs text-secondary mb-0"> {{ $section->year  }}  {{  ", " .  $section->semester == '1' ? 'First Sem.' : 'Second Sem' }}</p>
                                              </div>
                                        </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary px-2 py-2"  onclick="addborrower(2,{{ $section->id }})">
                                                    <i class="fa-solid fa-plus"></i>
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






        <div class="col-12 col-md-6  col-lg-6">
            <div class="card mb-4">
                <div class="card-body ">
                    <h5>Borrowing Form</h5>
                    <hr>

                    <div class="d-flex flex-row-reverse ">
                        <div class="p-2 ">
                            <button type="button" class="btn btn-primary text-white " data-bs-toggle="modal" data-bs-target="#addedItemsModal">
                                <i class="fa-solid fa-bong"></i> Added Items ( {{ sizeOf(Session::get('addeditems')) -1; }} )
                            </button>
                        </div>
                        <div class="p-2 ">
                            <button type="button" class="btn btn-primary text-white " data-bs-toggle="modal" data-bs-target="#borrowerModal">
                                <i class="fa-solid fa-bong"></i> Borrower
                            </button>
                        </div>
                    </div>

                    <form role="form" method="post" action="{{ route('borrowing.borrowitems') }}">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12">
                                <h6 class="mb-0 text-sm">Date Borrowed</h6>
                                <div class="mb-3">
                                    <input type="date" class="form-control" placeholder="Date Borrowed" name="dateborrowed"  value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12">
                                <h6 class="mb-0 text-sm">Description</h6>
                                <div class="mb-3 ">
                                    <textarea class="form-control" placeholder="Description..." id="floatingTextarea" name="description" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12">
                                <h6 class="mb-0 text-sm">Borrow type</h6>
                                <div class="mb-3">
                                    <select class="form-control" aria-label="Apparatusselect" name="type" required>
                                            <option value="semester"> Whole Semester</option>
                                            <option value="once"> One Time Only</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12">
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
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#studentTable').DataTable( {
            responsive: true,
        } );
        var sectiontable = $('#sectionTable').DataTable( {
            responsive: true,
        } );


        new $.fn.dataTable.FixedHeader( table );
    });

    $(function () {
        $("#borrowercategory").change(function () {
            let borrowercategory = $(this).val();

            let element_section = document.getElementById("sectiontablediv");
            let element_student = document.getElementById("studenttablediv");

            // let hidden = element.getAttribute("hidden");
            if(borrowercategory == '2')
            {
                element_section.removeAttribute("hidden");
                element_student.setAttribute("hidden" , "hidden");
            }
            else
            {
                element_section.setAttribute("hidden" , "hidden");
                element_student.removeAttribute("hidden");
            }

        });


    });
</script>

@include('components.notification')
@include('admin.modals.borrowing.addeditems')
@include('admin.modals.borrowing.borrower')
@endsection
