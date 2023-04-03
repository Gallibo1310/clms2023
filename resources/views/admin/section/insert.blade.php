@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">


    <div class="row pt-4">
      <div class="col-12">
        <div class="card mb-4">
            <div class="card-body ">
                <p class="w-100 text-center font-weight-bolder h5 pt-4">NEW SECTION FORM</p>
                <form role="form" method="post" action="{{ route('section.store') }}">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Section Name" name="name" >
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
                                <select class="form-control" aria-label="Apparatusselect" name="year">
                                    @foreach ($SchoolYears as $year )
                                        <option value="{{ $year->year }}"> {{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <select class="form-control" aria-label="Apparatusselect" name="semester">
                                    <option value="1"> 1st Semester</option>
                                    <option value="2"> 2nd Semester</option>
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
