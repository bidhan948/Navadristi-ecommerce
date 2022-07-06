@extends('layouts.master')
@section('title', 'Message ')
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Message </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active"> Message </li>
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
                    {{-- <div class="text-sm-right">
                        <a href="{{ route('message') }}" type="button"
                            class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                class="bx bx-arrow-back mr-1"></i> Message  </a>
                    </div> --}}

                    <form class="custom-validation" action="{{ route('edit-message') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label> Name</label>
                            <div>
                                <input type="text" name="name" value="{{ $message->name }}" class="form-control" required
                                
                                placeholder="Enter  Name " value=" " />
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Position </label>
                            <div>
                                <input type="text" name="position" class="form-control" required
                                placeholder="Position " value="{{ $message->position }} " />
                                <input name="id" type="hidden" value="{{ $message->id }}">

                            </div>
                        </div>
                        <div class="form-group">
                            <label> Message </label>
                            <div>


                                    <textarea name="message" required id="summernote1" class="form-control" rows="5">{{ $message->message }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="resume">Photo</label>
                            <input type="file" name="photo" class="form-control-file" id="notice-img">
                            <img src="{{ asset('uploads/message/'.$message->photo) }}" width="200px" alt="">
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
