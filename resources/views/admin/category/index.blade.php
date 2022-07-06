@extends('layouts.master')
@section('title', 'View Services')
@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">View Category</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Category</li>
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
                            <a href="{{ route('add-category') }}" type="button"
                                class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                    class="bx bx-arrow-back mr-1"></i> Add Category </a>
                        </div>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="w-5">S.No.</th>
                                    <th>Category</th>
                                    <th class="w-15">Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php($count = 1)
                                @foreach ($category as $item)
                                    <tr>
                                        <td> {{ $count++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="d-flex">

                                            {{-- edit btn --}}
                                            <button class="d-btn btn-primary  mr-2">
                                                <a href="{{ route('edit-category', $item->id) }}" class="text-light"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Edit"><i
                                                        class="mdi mdi-pencil font-size-18"></i></a>
                                            </button>
                                            {{-- Delete btn --}}
                                            <form class=""
                                                action="{{ route('delete-category', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-danger d-btn">
                                                    <i class="mdi mdi-trash-can font-size-18"></i>
                                                </button>

                                            </form>
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
