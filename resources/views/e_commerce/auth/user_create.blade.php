@extends('layouts.master')
@section('title', 'Add User')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Add User</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.auth.index') }}">User</a> </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-sm-right">
                            <a href="{{ route('career') }}" type="button"
                                class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                    class="bx bx-arrow-back mr-1"></i> View Career </a>
                        </div>

                        <form class="custom-validation" action="{{ route('add-career') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name </label>
                                <div>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                        value="{{ old('name') }}" required />
                                    @error('name')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <div>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="email"
                                        value="{{ old('email') }}" required />
                                    @error('email')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <div>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="email"
                                        value="{{ old('email') }}" required />
                                    @error('email')
                                        <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
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
