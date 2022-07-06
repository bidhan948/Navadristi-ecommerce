@extends('layouts.master')
@section('title', 'Edit Team Member')
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Team Member</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Team Member</li>
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
                                class="bx bx-arrow-back mr-1"></i> View Team Member </a>
                    </div>

                    <form class="custom-validation" action="{{ route('update-team',$team->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name </label>
                            <div>
                                <input type="text" name="name" class="form-control" required
                                placeholder="Enter  Title" value="{{ $team->name }} " />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Position </label>
                            <div>
                                <input type="text" name="position" class="form-control" required
                                    placeholder="Enter  Position " value="{{ $team->position }}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <div>
                                <textarea name="description" id="summernote1"  class="form-control" rows="5"> {{ $team->description }}  </textarea>
                                {{-- <textarea name="description" value="{{ $team->description }}" id="" cols="30" rows="10"> {{ $team->description }} </textarea> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Facebook Link </label>
                            <div>
                                <input type="text" name="facebook" class="form-control"
                                    placeholder="Enter  Facebook Url " value="{{ $team->fb_url }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Instagram Link </label>
                            <div>
                                <input type="text" name="instagram" class="form-control"
                                    placeholder="Enter Instagram Url " value="{{ $team->in_url }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Twitter Link </label>
                            <div>
                                <input type="text" name="twitter" class="form-control"
                                    placeholder="Enter  Twitter Url " value="{{ $team->tw_url }}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="resume"> Image</label>
                            <input type="file" name="image" class="form-control-file" id="notice-img">
                            <img src="{{ asset('uploads/team/'.$team->image) }}" width="200px" alt="">
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
