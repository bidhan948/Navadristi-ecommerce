@extends('layouts.master')
@section('title', 'View Team Member')
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Add Team Member </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Team Member </li>
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
                        <a href="{{ route('team') }}" type="button"
                            class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                class="bx bx-arrow-back mr-1"></i> View Team Member</a>
                    </div>

                    <form class="custom-validation" action="{{ route('add-team') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label> Name </label>
                            <div>
                                <input type="text" name="name" class="form-control" required
                                    placeholder="Enter  name" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Position </label>
                            <div>
                                <input type="text" name="position" class="form-control" required
                                    placeholder="Enter  Position " value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div>
                                <textarea id="summernote1" name="description" required class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Facebook Link </label>
                            <div>
                                <input type="text" name="facebook" class="form-control"
                                    placeholder="Enter  Facebook Url " value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Instagram Link </label>
                            <div>
                                <input type="text" name="instagram" class="form-control"
                                    placeholder="Enter Instagram Url " value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Twitter Link </label>
                            <div>
                                <input type="text" name="twitter" class="form-control"
                                    placeholder="Enter  Twitter Url " value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="resume">Image</label>
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
