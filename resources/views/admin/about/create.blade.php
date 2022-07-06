@extends('layouts.master')
@section('title', 'About')
@section('content')


<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit About</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="about-list.html">About List</a></li>
                        <li class="breadcrumb-item active">Edit About</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        @if (session('status'))
            <h6 class="alert alert-success">
                {{ session('status') }}
            </h6>
            @endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {{-- <div class="text-sm-right">
                        <a href="about-list.html" type="button"
                            class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                class="bx bx-arrow-back mr-1"></i> Go Back </a>
                    </div> --}}
                    <form class="custom-validation" action="{{ route('edit-about',$about->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>About</label>
                            <div>
                                <input type="text" class="form-control" name="title" required
                                    placeholder="Enter About Title" value="{{ $about->title }}" />

                                    {{-- id pass --}}
                                    {{-- <input name="id" type="hidden" value="{{ $about->id }}"> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>About Content</label>
                            <div>
                                <textarea required class="form-control" name="description" id="summernote1" rows="14">
                                    {{ $about->description }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone No. :</label>
                            <div>
                                <input type="text" name="phone" class="form-control" required
                                    placeholder="Enter address" value="{{ $about->phone }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <div>
                                <input type="text" name="email" class="form-control" required
                                    placeholder="Enter email" value="{{ $about->email }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address :</label>
                            <div>
                                <input type="text" name="address" class="form-control" required
                                    placeholder="Enter address" value="{{ $about->address }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Facebook Url</label>
                            <div>
                                <input type="url" name="fb_url" class="form-control" required
                                    placeholder="Enter facebook Url" value="{{ $about->fb_url }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Twitter Url</label>
                            <div>
                                <input type="url" name="tw_url" class="form-control" required
                                    placeholder="Enter twitter Url" value="{{ $about->tw_url }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Instagram Url</label>
                            <div>
                                <input type="url" name="in_url" class="form-control" required
                                    placeholder="Enter instagram Url" value="{{ $about->in_url }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>whatsapp  Number </label>
                            <div>
                                <input type="number" name="w_link" class="form-control" required
                                    placeholder="Enter whatsapp number" value="{{ $about->w_link }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Viber  Number </label>
                            <div>
                                <input type="number" name="v_link" class="form-control" required
                                    placeholder="Enter viber number" value="{{ $about->v_link }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="resume">Image</label>
                            <input type="file" name="image" class="form-control-file" id="hospital-img">
                            <img src="{{ asset('uploads/about/'.$about->image) }}" width="200px" alt="">
                        </div>
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