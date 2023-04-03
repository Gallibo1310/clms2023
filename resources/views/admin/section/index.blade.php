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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Sections</p>
                    <h5 class="font-weight-bolder">
                      {{ $Sections->count() }}
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">This Year</p>
                    <h5 class="font-weight-bolder">
                      {{ '154' }}
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Current School Year</p>
                    <h5 class="font-weight-bolder">
                      {{ $Settings->currentyear }}
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Current Semester</p>
                    <h5 class="font-weight-bolder">
                        {{ $Settings->currentsemester == '1' ? '1st Semester' : '2nd Semester'}}
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
            <h6>APPARATUS TABLE</h6>
            <span class="text-end">
                <a class="btn btn-primary text-white px-3 py-2" href="{{ route('section.addpage') }}">
                    <i class="fa-solid fa-plus"></i><i class="fa-solid fa-user-group"></i> New Section
                </a>

            </span>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0 px-2">
                <table class="table align-items-center mb-0 table-bordered table-striped nowrap " id="sectionsTable"  >
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Section</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No. of Students</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Year</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Semester</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($Sections as $section )
                            <tr>
                                <td class=" text-left text-sm">
                                    <span class="badge badge-sm bg-gradient-success">{{ $loop->index +1 }}</span>
                                </td>
                                <td>
                                    <p class=" text-left text-xs font-weight-bold mb-0">{{ $section->sectionname }}</p>
                                </td>
                                <td>
                                    <p class=" text-left text-xs font-weight-bold mb-0">{{ $section->students->count() }}</p>
                                </td>
                                <td>
                                    <p class=" text-left text-xs font-weight-bold mb-0">{{ $section->year }}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-danger">{{ $section->semester }}</span>
                                </td>
                                <td>
                                    <p>{{ $section->description }}</p>
                                </td>
                                <td class="align-center text-center">
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


</div>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#sectionsTable').DataTable( {
            responsive: true,
        } );

        new $.fn.dataTable.FixedHeader( table );
    });
</script>

@endsection
