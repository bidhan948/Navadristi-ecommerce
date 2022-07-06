@extends('layouts.master')
@section('title', 'Edit Slider ')
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Slider</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Slider</li>
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

                    <form class="custom-validation" action="{{ route('update-slider',$slider->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Title</label>
                            <div>
                                <input type="text" name="title" class="form-control" required
                                placeholder="Enter Slider Title" value="{{ $slider->title }} " />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Body Content</label>
                            <div>
                                <textarea id="summernote1" name="description" class="form-control" id="" cols="30" rows="10" >
                                    {{ $slider->description }}
                                </textarea>
                                {{-- <input type="text" name="description" class="form-control" required
                                    placeholder="Enter Slider Description" value="{{ $slider->description }}" /> --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="resume">Slider Image</label>
                            <input type="file" name="image" class="form-control-file" id="notice-img">
                            <img src="{{ asset('uploads/slider/'.$slider->image) }}" width="200px" alt="">
                        </div>

                        <div class="form-group mb-0">
                            <div>
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-light mr-1">
                                    Update
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
