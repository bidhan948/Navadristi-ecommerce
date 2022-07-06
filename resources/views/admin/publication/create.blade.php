@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Publication</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Publication</li>
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
                            <a href="{{ route('publication') }}" type="button"
                                class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                    class="bx bx-arrow-back mr-1"></i> View Publication </a>
                        </div>

                        <form class="custom-validation" action="{{ route('add-publication') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label> Title</label>
                                <div>
                                    <input type="text" name="title" class="form-control" required
                                        placeholder="Enter  Title" value="{{ old('title') }}" />
                                </div>
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label> Description</label>
                                <div>
                                    <textarea name="description" id="summernote1" required class="form-control"
                                        rows="5"> {{ old('description') }} </textarea>
                                </div>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="resume">Cover Image </label>
                                <input type="file" name="cover_img" class="form-control-file" id=""
                                    value="{{ old('cover_img') }}">
                                @if ($errors->has('cover_img'))
                                    <span class="text-danger">{{ $errors->first('cover_img') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Author Name </label>
                                <div>
                                    <input type="text" name="auth_name" class="form-control" required
                                        placeholder="Enter  author name" value="{{ old('auth_name') }}" />
                                </div>
                                @if ($errors->has('auth_name'))
                                    <span class="text-danger">{{ $errors->first('auth_name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> published Year </label>
                                <div>
                                    <input type="text" name="public_year" class="form-control" required
                                        placeholder="Enter  Title" value="{{ old('public_year') }} " />
                                </div>
                                @if ($errors->has('public_year'))
                                    <span class="text-danger">{{ $errors->first('public_year') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="file"> File </label>
                                <input type="file" name="file" class="form-control-file" id="" value="{{ old('file') }}">
                                @if ($errors->has('file'))
                                    <span class="text-danger">{{ $errors->first('file') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
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
