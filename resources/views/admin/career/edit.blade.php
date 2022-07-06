@extends('layouts.master')
@section('title', 'Edit Career')
@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Edit Career</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Career</li>
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
                            <a href="{{ route('career') }}" type="button"
                                class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                    class="bx bx-arrow-back mr-1"></i> View Career </a>
                        </div>

                        <form class="custom-validation" action="{{ route('update-career', $career->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Title</label>
                                <div>
                                    <input type="text" name="title" class="form-control" required
                                        placeholder="Enter Title" value="{{ $career->title }} " />
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Position</label>
                                <div>
                                    <select name="position_id" id="" class="form-control">
                                        <option value="">{{ __('please select') }}</option>
                                        @foreach ($positions as $position)
                                            <option value="{{ $position->id }}"
                                                {{ $career->position->id == $position->id ? 'selected' : '' }}>
                                                {{ $position->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label> Education Qualification </label>
                                <div>

                                    <input type="text" name="education_qualification" class="form-control"
                                        placeholder="Education Qualification"
                                        value="{{ $career->education_qualification }}" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label> No. of Vacancy/s </label>
                                <div>

                                    <input type="text" name="vacancy_no" class="form-control"
                                        placeholder="No. of Vacancy/s " value="{{ $career->vacancy_no }}" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Experience </label>
                                <div>

                                    <input type="text" name="experience" class="form-control" placeholder="Experience "
                                        value="{{ $career->experience }}" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Deadline </label>
                                <div>

                                    <input type="date" name="deadline" class="form-control" placeholder="Deadline "
                                        value="{{ $career->deadline }}" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Job Description</label>
                                <div>

                                    <textarea name="job_description" id="summernote1" rows="10" class="form-control">
                                        {{ $career->job_description }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image"> Image</label>
                                <input type="file" name="image" class="form-control-file" id="notice-img">
                                <img src="{{ asset('public/uploads/career/' . $career->image) }}" class="w-15"
                                    alt="">
                            </div>

                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
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
