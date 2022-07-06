@extends('layouts.master')
@section('title', 'View News & Event')
@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">View News & Event</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">News & Event</li>
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
                        <a href="{{ route('add-news') }}" type="button"
                            class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                class="bx bx-arrow-back mr-1"></i> Add News & Slider  </a>
                    </div>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="w-5">S.No.</th>
                                <th> Title</th>
                                {{-- <th> Description </th> --}}
                                {{-- <th>Image</th> --}}
                                <th class="w-15">Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @php($count =1)
                            @foreach ($news as $item )

                            <tr>
                                <td>   {{  $count++ }}</td>
                                <td>{{ $item->title }}</td>
              
                                <td class="d-flex">
                              
                                    <button type="button" class=" btn-success btn-sm mr-2  waves-effect waves-light" data-toggle="modal" data-target=".exampleModal{{  $item->id }}">
                                        <i class='bx bxs-show' ></i>
                                    </button>
                                    {{-- edit btn --}}
                                    <button class="d-btn btn-primary  mr-2">
                                        <a href="{{ route('edit-news', $item->id) }}" class="text-light"
                                        data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Edit"><i
                                            class="mdi mdi-pencil font-size-18"></i></a>
                                    </button>
                                    {{-- Delete btn --}}
                                    <form class="" action="{{ route('delete-news', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-danger d-btn">
                                            <i class="mdi mdi-trash-can font-size-18"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal -->
                                
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
