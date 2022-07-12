@extends('layouts.master')
@section('title', 'Package details')
@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">View package Details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">package details</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        {{-- this is for adding package --}}
        <!-- Modal -->
        <div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add package detail
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body view-info">
                        <div class="row">
                            <form action="{{ route('admin.package_detail.store') }}" method="post">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <div>
                                                            <input type="text" name="name"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                placeholder="Name " value="{{ old('name') }}" required />
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label> Package Name</label>
                                                        <div>
                                                            <select name="package_id" id="package_id" class="form-control">
                                                                <option value="">{{ __('--Please Select--') }}
                                                                </option>
                                                                @foreach ($packages as $package)
                                                                    <option value="{{ $package->id }}">
                                                                        {{ $package->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('package_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <div>
                                                            <input type="number" step="0.1" name="price"
                                                                class="form-control @error('price') is-invalid @enderror"
                                                                placeholder="$" value="{{ old('price') }}" required />
                                                            @error('price')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <div>
                                                            <textarea name="description" id="summernote1" rows="10" class="form-control"></textarea>
                                                            @error('description')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-print-none">
                                            <div class="float-right">
                                                <a href="#" class="btn btn-danger w-md waves-effect waves-light"
                                                    data-dismiss="modal">Close</a>
                                                <button type="submit"
                                                    class="btn btn-primary w-md waves-effect waves-light">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
        {{-- end modal --}}
        {{-- xx this is for adding package xx --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-sm-right">
                            <a href="#" type="button"
                                class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2" data-toggle="modal"
                                data-target=".exampleModal"><i class="bx bx-arrow-back mr-1"></i> Add packages </a>
                        </div>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="w-5">S.No.</th>
                                    <th>Name</th>
                                    <th>Package Name</th>
                                    <th>Price</th>
                                    <th> Description </th>
                                    <th class="w-15">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($package_details as $key => $packageDetail)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $packageDetail->name }}</td>
                                        <td>{{ $packageDetail->Package->name }}</td>
                                        <td>{{ '$' . $packageDetail->price }}</td>
                                        <td>{!! $packageDetail->description !!}</td>
                                        <td><a href="{{ route('admin.package_detail.edit', $packageDetail) }}"
                                                type="button"
                                                class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                                    class='bx bx-edit mr-1'></i> Edit packages </a></td>
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
