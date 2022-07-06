@extends('layouts.master')
@section('title', 'View Career')
@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">View CV </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">CV</li>
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
                                    class="bx bx-arrow-back mr-1"></i> back </a>
                        </div>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="w-5">S.No.</th>
                                    <th> Name </th>
                                    <th> Position </th>
                                    <th> Phone No.</th>
                                    <th> Email </th>
                                    <th> Date </th>
                                    <th class="w-15">Download</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($count = 1)
                                @foreach ($resume as $item)
                                    <tr>
                                        <td> {{ $count++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->position->name }} </td>
                                        <td> {{ $item->mobile_no }}</td>
                                        <td> {{ $item->email }}</td>
                                        <td> {{ $item->created_at }}</td>
                                        <td>
                                            <button class="d-btn btn-primary  mr-2">
                                                <a class="text-light" href="{{ asset('uploads/cv/' . $item->cv) }}"
                                                    download>
                                                    <i class='bx bx-download'></i>
                                                </a>
                                            </button>

                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->


@endsection
