@extends('layouts.master')
@section('title', 'Message From Chairman')
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">View Message</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Message </li>
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
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th> Name</th>
                                <th> Message </th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($message as $item)
                                <tr>
                                    <td>#</td>
                                    <td> {{ $item->name }}</td>
                                    <td> {{ $item->position }}</td>
                                    <td> {{ $item->message }}</td>
                                    <td>
                                        <a href="{{ route('edit-message', $item->id) }}" class="mr-3 text-primary"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Edit"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>
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
