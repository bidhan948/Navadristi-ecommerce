<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title')</title>

    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- Include Summernote CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body data-sidebar="dark">
    {{-- Include Loading --}}
    @include('layouts.inc.loading');

    <!-- Begin page -->
    <div id="layout-wrapper">
        {{-- Include Top Menu  --}}
        @include('layouts.inc.admin-navbar');

        {{-- Include Side Navbar --}}
        @include('layouts.inc.admin-sidebar');


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
               @yield('content')
            </div>
            <!-- End Page-content -->

            {{-- Footer Include --}}
            @include('layouts.inc.admin-footer');

        </div>
        <!-- end main content-->
    </div>
    {{-- <script>
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
        console.error( error );
        } );
        </script> --}}
<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<!-- Required datatable js -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Datatable init js -->
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

{{-- CK Editor --}}
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script> --}}
{{-- Summernote JS --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="{{ asset('assets/js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#summernote1').summernote({
            height: 180,
        });
    });
    $(document).ready(function() {
        $('#summernote2').summernote({
            height: 180,
        });
    });
    $(document).ready(function() {
        $('#summernote3').summernote({
            height: 180,
        });
    });
</script>
</body>
</html>
