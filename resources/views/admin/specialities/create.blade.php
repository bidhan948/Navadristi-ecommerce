@extends('layouts.master')
@section('title', 'Add Specialities ')
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Add Specialities </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Specialities </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            @if (session('status'))
            <h6 class="alert alert-success">
                {{ session('status') }}
            </h6>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="text-sm-right">
                        <a href="{{ route('specialities') }}" type="button"
                            class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                class="bx bx-arrow-back mr-1"></i> View Specialities  </a>
                    </div>

                    <form class="custom-validation" action="{{ route('add-specialities') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label> Name </label>
                            <div>
                                <input type="text" name="name" class="form-control" required
                                placeholder="Enter name" value=" " />
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Description</label>
                            <div>
                                    <textarea name="description" id="summernote1" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Symptoms</label>
                            <div>
                                
                                    <textarea name="symptoms" id="summernote2" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Treatment Option </label>
                            <div>
                                
                                    <textarea name="treatment_options" id="summernote3" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
   

                        <div class="form-group">
                            <label for="icon"> Icon </label>
                            <input type="file" name="icon" class="form-control-file" id="notice-img">
                        </div>
                        <div class="form-group">
                            <label for="image"> Image</label>
                            <input type="file" name="image" class="form-control-file" id="notice-img">
                        </div>

                        <div class="form-group mb-0">
                            <div>
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-light mr-1">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->


@endsection
