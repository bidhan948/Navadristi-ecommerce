@extends('layouts.master')
@section('title', 'Edit Service')
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Service</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Service</li>
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
                        <a href="{{ route('service') }}" type="button"
                            class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                class="bx bx-arrow-back mr-1"></i> View Service </a>
                    </div>

                    <form class="custom-validation" action="{{ route('update-service',$service->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Title</label>
                            <div>
                                <input type="text" name="title" class="form-control" required
                                placeholder="Enter Slider Title" value="{{ $service->title }} " />
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="category">Select Category </label>
                                <select class="form-control" id="category" name="category">
                                    <option value="">{{ __('select category') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $service->categories != null ? ($category->id == $service->categories->id ? 'selected' : '') : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <h6 class="alert alert-success">
                                        {{ $message }}
                                    </h6>
                                @enderror
                            </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div>
                                
                                    <textarea required class="form-control" id="summernote1" name="description" rows="5">
                                        {{ $service->description }}
                                    </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="resume"> Image</label>
                            <input type="file" name="image" class="form-control-file" id="notice-img">
                            <img src="{{ asset('uploads/service/'.$service->image) }}" width="200px" alt="">
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
