@extends('layouts.master')
@section('title', 'View Career')
@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">View Career</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Career</li>
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
                            <a href="{{ route('add-career') }}" type="button"
                                class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                    class="bx bx-arrow-back mr-1"></i> Add Career </a>
                        </div>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="w-5">S.No.</th>
                                    <th> Title</th>
                                    <th> Position </th>
                                    <th class="w-15">Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($count = 1)

                                @foreach ($career as $item)
                                    <tr>
                                        <td> {{ $count++ }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{!! $item->position->name !!}</td>
                                        <td class="d-flex">
                                            {{-- view btn --}}
                                            <button type="button" class=" btn-success btn-sm mr-2  waves-effect waves-light"
                                                data-toggle="modal" data-target=".exampleModal{{ $item->id }}">
                                                <i class='bx bxs-show'></i>
                                            </button>
                                            {{-- edit btn --}}
                                            <button class="d-btn btn-primary  mr-2">
                                                <a href="{{ route('edit-career', $item->id) }}" class="text-light"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Edit"><i
                                                        class="mdi mdi-pencil font-size-18"></i></a>
                                            </button>
                                            {{-- Delete btn --}}
                                            <form class="" action="{{ route('delete-career', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-danger d-btn">
                                                    <i class="mdi mdi-trash-can font-size-18"></i>
                                                </button>

                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Career Information
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body view-info">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <ul class="notice-list notice-info-list">
                                                                                    <li class="col-md-12">
                                                                                        <strong> Title : </strong><br>
                                                                                        <span>{{ $item->title }}</span>
                                                                                    </li>

                                                                                    <li class="col-md-12">
                                                                                        <strong>Position : </strong> <br />
                                                                                        <span>
                                                                                            {!! $item->position->name !!}</span>
                                                                                    </li>

                                                                                    <li class="col-md-12">
                                                                                        <strong>Education Qualification :
                                                                                        </strong> <br />
                                                                                        <span>
                                                                                            {!! $item->education_qualification !!}</span>
                                                                                    </li>

                                                                                    <li class="col-md-12">
                                                                                        <strong>Vacancy No : </strong>
                                                                                        <br /> <span>
                                                                                            {!! $item->vacancy_no !!}</span>
                                                                                    </li>
                                                                                    <li class="col-md-12">
                                                                                        <strong>Experience : </strong>
                                                                                        <br /> <span>
                                                                                            {!! $item->experience !!}</span>
                                                                                    </li>
                                                                                    <li class="col-md-12">
                                                                                        <strong>Deadline : </strong>
                                                                                        <br /> <span>
                                                                                            {!! $item->deadline !!}</span>
                                                                                    </li>
                                                                                    <li class="col-md-12">
                                                                                        <strong>Job Description : </strong>
                                                                                        <br /> <span>
                                                                                            {!! $item->job_description !!}</span>
                                                                                    </li>
                                                                                    <li class="col-md-12">
                                                                                        <strong>Image : </strong>
                                                                                        <br /> <span>
                                                                                            <img src="{{ asset('public/uploads/career/' . $item->image) }}"
                                                                                                class="w-15"
                                                                                                alt=""></span>
                                                                                    </li>

                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-print-none">
                                                                    <div class="float-right">
                                                                        <a href="#"
                                                                            class="btn btn-danger w-md waves-effect waves-light"
                                                                            data-dismiss="modal">Close</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end modal --}}
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->


@endsection
