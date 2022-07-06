@extends('layouts.master')
@section('title', 'Add Slider ')
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Add Slider</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Slider</li>
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
                        <a href="{{ route('slider') }}" type="button"
                            class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                class="bx bx-arrow-back mr-1"></i> View Slider </a>
                    </div>

                    <form class="custom-validation" action="{{ route('add-slider') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <div>
                                {{-- <input type="text" name="title" class="form-control" 
                                placeholder="Enter Slider Title" value=" " required /> --}}
                                <input type="text" name="title" class="form-control" placeholder="Enter Title" value="" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Body Content</label>
                            <div>
                                <textarea id="summernote1" name="description"  class="form-control" id="" cols="30" rows="10"></textarea>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="resume">Slider Image</label>
                            <p class='text-danger'> The image maximum size is 2MB. </p>
                            <input type="file" name="image" class="form-control-file" id="notice-img">
                     
                             @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
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
