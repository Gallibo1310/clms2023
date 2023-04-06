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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Borrowings</p>
                    <h5 class="font-weight-bolder">
                        {{ $Borrowings->count() }}
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
                        {{ $Borrowings->count() }}
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
                        {{ $Borrowings->count() }}
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
                        {{ $Borrowings->count() }}
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
            <h6>BORROWINGS TABLES</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0 mx-2" >
              <table class="table align-items-center mb-0 table-bordered table-striped nowrap " id="borrowingsTable"  >
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Borrower</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Borrowed Qty</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Year</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Semester</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Borrowings as $borrowing )
                        <tr>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-gradient-success">{{ $loop->iteration }}</span>
                            </td>
                            <td>
                                @if (is_null($borrowing->section_id))
                                    <p class="text-xs font-weight-bold mb-0">{{ $borrowing->borrowers[0]->student->firstname.' '.$borrowing->borrowers[0]->student->lastname}}</p>
                                @else
                                    <p class="text-xs font-weight-bold mb-0">This is section</p>
                                @endif
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $borrowing->dateborrowed}}</p>
                            </td>
                            <td>
                                <p class=" btn py-2 text-xs font-weight-bold mb-0 {{ $borrowing->status =='Active' ? ' btn-danger ' : ' btn-success ' }}">{{ $borrowing->status }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">Total Qty: {{ $borrowing->totalqty }}</p>
                                <p class="text-xs font-weight-bold mb-0">Returned: {{ $borrowing->returnedqty }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $borrowing->borrowingtype }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $borrowing->year }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $borrowing->semester }}</p>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary text-white " data-bs-toggle="modal" data-bs-target="#addStudentModal">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>

            </div>
          </div>
{{--
          0- Not used
          1- Active
          2- Damage
          3- Under Repair
          4- Lost --}}
          {{-- This is a modal for returning apparatus --}}
          <div class="modal fade" id="addStudentModal" role="dialog" >
            <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content" >
                <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white">
                Return
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                {{-- This is the body of Modal for returning --}}

                <table class="table align-items-center mb-0 table-bordered table-striped nowrap " id="studentTable"  >
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Apparatus </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Qty</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Returned QTY</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remarks</th>

                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remarks</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($Borrowings as $borrowing )
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-success">{{ $loop->index +1 }}</span>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $borrowing->borrowingtype }}</p>
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


<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#borrowingsTable').DataTable( {
            responsive: true,
        } );

        new $.fn.dataTable.FixedHeader( table );
    });
</script>


@endsection
