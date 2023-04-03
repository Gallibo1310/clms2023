@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">


    <div class="row pt-4">
      <div class="col-12">
        <div class="card mb-4">
            <div class="card-body ">
                <p class="w-100 text-center font-weight-bolder h5 pt-4">NEW STUDENT FORM</p>
                <form role="form" method="post" action="{{ route('student.store') }}">
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="ID number" name="idnumber" required >
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="First Name" name="firstname"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Middle Name" name="middlename"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Last Name" name="lastname" required >
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
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
                                <input type="date" class="form-control" placeholder="Birthday" name="birthdate"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Address" name="address"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Contact" name="contact"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="mb-3">
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
