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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Apparatus</p>
                    <h5 class="font-weight-bolder">
                      {{ $Apparatus->count() }}
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Borrowed</p>
                    <h5 class="font-weight-bolder">
                      {{ $Apparatus->sum('borrowed'); }}
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Classes</p>
                    <h5 class="font-weight-bolder">
                      +3,462

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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
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
            <div class="card-body ">
                    <p class="w-100 text-center font-weight-bolder h5 pt-4">APPARATUS FORM</p>
                    <form role="form" method="post" action="{{ route('apparatus.store') }}">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Name" name="name" >
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Volume" name="volume" >
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="number" class="form-control" placeholder="Quantity" name="qty" >
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Location" name="location" >
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                <div class="mb-3 ">
                                    <textarea class="form-control" placeholder="Description..." id="floatingTextarea" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <select class="form-control" aria-label="Apparatusselect" name="category">
                                        @foreach ($Categories as $category )
                                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                        @endforeach
                                    </select>
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
</div>


@include('components.notification')
@endsection
